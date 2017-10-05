<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main_container">
	<header>
		<div class="header_compartment header_left">
			<h1 class="main_header_text">GuessChan?</h1>
		</div>
		<div class="header_compartment header_center">
		</div>
		<div class="header_compartment header_right">
			<div class="score_parent">
				<span class="right_parent">Right: <span class="right_number">0</span></span>
				<span class="wrong_parent">Wrong: <span class="wrong_number">0</span></span>
				<!-- <span class="total_parent">Total: <span class="total_number">0</span></span> -->
			</div>
		</div>
	</header>
	<div class="clearfix"></div>
	<hr>

	<div class="postContainer replyContainer" id="pc1234567899">
		<div class="sideArrows" id="sa1234567899">&gt;&gt;</div>
		<div id="p1234567899" class="post reply">
			<div class="postInfoM mobile" id="pim1234567899"><span class="nameBlock"><span class="name">Anonymous</span><br></span><span class="dateTime postNum" data-utc="5678">04/20/69(Wed)16:20:42 <a href="#" title="Link to this post">No.</a><a href="#" title="Reply to this post">1234567899</a></span></div>
			<div class="postInfo desktop" id="pi1234567899"><input type="checkbox" name="1234567899" value="delete"> <span class="nameBlock"><span class="name">Anonymous</span> </span> <span class="dateTime" data-utc="5678">04/20/69(Wed)16:20:42</span> <span class="postNum desktop"><a href="#" title="Link to this post">No.</a><a class="post_link" target="_blank" href="<?php echo $random['link'] ?>" title="Reply to this post">1234567899</a></span></div>
			<blockquote class="postMessage greentext_this embedica_this" id="m1234567899">
				<!-- Here is the post -->
				<span class="the_post"><?php echo $random['post']; ?></span>
			</blockquote>
	   </div>
	</div>

	<div class="last_answer_parent">
		<span class="last_answer_element last_answer_status">N/A</span>
		<span class="last_answer_element that_was">That was </span>
		<span class="last_answer_element last_answer_board"></span>
		<a class="last_answer_element last_answer_link" target="_blank" href="#">View on 4chan</a>
		<button class="next_button">Next</button>
	</div>

	<span class="answer_board_abbr" style="display: none"><?php echo $random['board_abbr'] ?></span>
	<span class="answer_board_title" style="display: none"><?php echo $random['board_title'] ?></span>
	<span class="answer_link" style="display: none"><?php echo $random['link'] ?></span>
	<br>
	<hr>
	<div class="selection_compartment selection_left">
		<p><span class="or_mobile">Or</span> Select the board you think this post came from</p>
		<?php $i = 0; ?>
		<?php foreach ($boards as $board) { ?>
			<a href="#" class="board_selection" board="<?php echo $board['board']; ?>">/<?php echo $board['board']; ?>/ - <?php echo $board['title']; ?></a>
			<br>
			<?php $i++; ?>
		<?php } ?>
	</div>
	<div class="selection_compartment selection_right">
		<p><span class="or_desktop">Or</span> Enter the board abbreviation here</p>
		<input id="board_text_input" type="text"/>
		<button id="board_text_submit" type="submit">Submit</button>
	</div>

	<br>
	<br>
	<hr>
	<div class="how_it_works">
		<strong>How it works</strong>
		<p class="quote">>A random post from a random page of a random board is selected. All boards are choosen with equal likelyhood, meaning /b/ is as likely to pop up as /n/. Most post numbers (>>1234) are removed because they are too big a clue. This was built proudly with PHP using CodeIgniter 3 and the 4chan API. You can view and contribute to the code on <a target="_blank" href="https://github.com/goosehub/guesschan">GitHub</a>. [s4s] is nice board.</p>
	</div>
	<br>
</div>