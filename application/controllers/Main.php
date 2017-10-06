<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	protected $json_folder_path = 'application/json/';


	function __construct() {
		parent::__construct();

		if (!is_dev()) {
			force_ssl();
		}
	}

	public function index()
	{
		// Get list of boards
		$data['boards'] = $this->get_list_of_boards();

		// Get a random post to start
		$data['random'] = $this->get_random_4chan_post(false, $data['boards']);

		// Load the views
		$this->load->view('header', $data);
		$this->load->view('main', $data);
		$this->load->view('footer', $data);
	}

	public function get_random_4chan_post($ajax = true, $boards = false)
	{
		// Pick a board
		$board = $this->choose_board($boards);

		// Get the page from board
		$board_page = $this->get_board_page($board);
		if (!$board_page) {
			echo 'site dun goofed';
			return false;
		}

		// Get a random post from page
		$random = $this->get_post($board_page);

		// Add data to post
		$random['link'] = 'https://boards.4chan.org/' . $board['board'] . '/thread/' . $random['thread_no'] . '#p' . $random['no'];
		$random['board_abbr'] = $board['board'];
		$random['board_title'] = $board['title'];

		// If this is ajax request for client, return the json
		if ($ajax) {
			echo json_encode($random);
		}

		// Else, return the object
		return $random;
	}

	public function choose_board($boards = false)
	{
		// On page load, board list are already available in memory
		if (!$boards) {
			$boards = $this->get_list_of_boards();
		}

		// Get random board
		$board = $boards[array_rand($boards, 1)];

		/*
		Officially, the longest war in history was between 
		the Netherlands and the Isles of Scilly, 
		which lasted from 1651 to 1986. 
		There were no casualties.
		*/

		// Return board
		return $board;
	}

	public function get_board_page($board)
	{
		// Get the json
		$board_json_path = $this->json_folder_path . $board['board'] . '.json';
		$raw_response = file_get_contents($board_json_path);
		if (!$raw_response) {
			echo 'file_get_contents dun goofed';
			return false;
		}

		// Decode the json
		$board_page = json_decode($raw_response);
		if (!$board_page) {
			echo 'json_decode dun goofed';
			return false;
		}

		// Convert to array one liner way
		$board_page = json_decode(json_encode($board_page), true);

		// Return the page
		return $board_page;
	}

	public function get_post($board_page)
	{
		// Random thread and post number
		$thread = rand(0, 9);
		$post_number = rand(0, 3);

		// If random post not valid, go recurssive
		if (!isset($board_page['threads'][$thread]['posts'][$post_number]['com'])) {
			return $this->get_post($board_page);
		}

		// Get the random post
		$random_post = $board_page['threads'][$thread]['posts'][$post_number]['com'];

		// Remove post number only
		$random_post = preg_replace('#<a.*?>.*?</a>#i', '', $random_post);

		// Remove break tag from start
		$random_post = preg_replace('/^<br>/', '', $random_post);

		// If not a post with alphabet letters, go recurssive
		if (!preg_match("/[a-z]/i", $random_post)) {
			return $this->get_post();
		}

		// Remove white space
		$random_post = trim($random_post);

		// Assign data
		$post['post'] = $random_post;
		$post['thread_no'] = $board_page['threads'][$thread]['posts'][0]['no'];
		$post['no'] = $board_page['threads'][$thread]['posts'][$post_number]['no'];

		// Return it
		return $post;
	}

	public function get_list_of_boards()
	{
		// Get from boards json
		$boards = json_decode(file_get_contents($this->json_folder_path . 'boards.json'));

		// Convert to array one liner way
		$boards = json_decode(json_encode($boards), true);

		// Return boards
		return $boards['boards'];
	}

	public function download_4chan($token = false)
	{
		// Use hash equals function to prevent timing attack
		if (!$token) {
			$this->load->view('errors/page_not_found');
			return false;
		}
		if (!hash_equals(CRON_TOKEN, $token)) {
			$this->load->view('errors/page_not_found');
			return false;
		}

		// Loop through boards
		$fourchan_base_url = 'https://a.4cdn.org/';
		$boards = $this->get_list_of_boards();
		foreach ($boards as $board) {
			$board = $board['board'];
			echo 'Downloading ' . $board . '<br>' . PHP_EOL;

			// Get some random page from this board
			$page = rand(1, 5);
			$full_url = $fourchan_base_url . $board . '/' . $page . '.json';
			$raw_response = file_get_contents($full_url);
			if (!$raw_response) {
				echo 'file_get_contents dun goofed';
				return false;
			}

			// Save json to file system
			file_put_contents($this->json_folder_path . $board . '.json', $raw_response);

			// Sleep for the API, only allowed at most one request per second
			// and let's use a prime number because prime numbers are awesome
			usleep(1087);
		}
	}
}
