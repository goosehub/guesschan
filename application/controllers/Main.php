<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['boards'] = $this->get_list_of_boards();
		$data['random'] = $this->get_random_4chan_post(false, $data['boards']);
		$this->load->view('header', $data);
		$this->load->view('main', $data);
		$this->load->view('footer', $data);
	}

	public function get_random_4chan_post($ajax = true, $boards = false)
	{
		$fourchan_base_url = 'https://a.4cdn.org/';
		if (!$boards) {
			$boards = $this->get_list_of_boards();
		}
		$board = $boards[array_rand($boards, 1)];
		$board = $board['board'];
		$page = rand(1, 5);
		$thread = rand(0, 9);
		$post_number = rand(0, 3);
		$full_url = $fourchan_base_url . $board . '/' . $page . '.json';
		$raw_response = file_get_contents($full_url);
		if (!$raw_response) {
			echo 'file_get_contents dun goofed';
			return false;
		}
		$board_page = json_decode($raw_response);
		if (!$board_page) {
			echo 'json_decode dun goofed';
			return false;
		}

		// Convert to array one liner way
		$board_page = json_decode(json_encode($board_page), true);

		// Get a random post
		$random = $this->get_post($board_page, $thread, $post_number);
		$random['regular_full_url'] = 'https://boards.4chan.org/' . $board . '/thread/' . $random['thread_no'] . '#p' . $random['no'];
		$random['board'] = $board;

		if ($ajax) {
			echo json_encode($random);
		}

		return $random;
	}

	public function get_post($board_page, $thread, $post_number)
	{
		// If not valid, go recurssive
		if (!isset($board_page['threads'][$thread]['posts'][$post_number]['com'])) {
			$thread = rand(0, 9);
			$post = rand(0, 3);
			return $this->get_post($board_page, $thread, $post_number);
		}

		// Get the random post
		$random_post = $board_page['threads'][$thread]['posts'][$post_number]['com'];

		// If not a post with alphabet letters, go recurssive
		if (!preg_match("/[a-z]/i", $random_post)) {
			return $this->get_post();
		}

		// Remove post number only
		$post['post'] = preg_replace('#<a.*?>.*?</a>#i', '', $random_post);
		$post['thread_no'] = $board_page['threads'][$thread]['posts'][0]['no'];
		$post['no'] = $board_page['threads'][$thread]['posts'][$post_number]['no'];

		// Return it
		return $post;
	}

	public function get_list_of_boards()
	{
		// Get from boards json
		$boards = json_decode(file_get_contents('application/json/boards.json'));

		// Convert to array one liner way
		$boards = json_decode(json_encode($boards), true);

		// Return boards
		return $boards['boards'];
	}
}
