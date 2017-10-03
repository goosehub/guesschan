<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row">
		<div class="stuff_container">
			<h1>GuessChan</h1>
			<hr>

			<div class="postContainer replyContainer" id="pc1234567899">
				<div class="sideArrows" id="sa1234567899">&gt;&gt;</div>
				<div id="p1234567899" class="post reply">
					<div class="postInfoM mobile" id="pim1234567899"><span class="nameBlock"><span class="name">Anonymous</span><br></span><span class="dateTime postNum" data-utc="5678">04/20/69(Wed)16:20:42 <a href="#" title="Link to this post">No.</a><a href="#" title="Reply to this post">1234567899</a></span></div>
					<div class="postInfo desktop" id="pi1234567899"><input type="checkbox" name="1234567899" value="delete"> <span class="nameBlock"><span class="name">Anonymous</span> </span> <span class="dateTime" data-utc="5678">04/20/69(Wed)16:20:42</span> <span class="postNum desktop"><a href="#" title="Link to this post">No.</a><a href="#" title="Reply to this post">1234567899</a></span></div>
					<blockquote class="postMessage greentext_this embedica_this" id="m1234567899">
						<!-- Here is the post -->
						<span class="the_post"><?php echo $random['post']; ?></span>
					</blockquote>
			   </div>
			</div>

			<span class="answer" style="display: none"><?php echo $random['board'] ?></span>
			<br>
			<hr>
			<a class="regular_full_url" target="_blank" href="<?php echo $random['regular_full_url']; ?>">View this post</a>
			<hr>
			<p class="lead">Select board you think this post came from</p>
			<?php $i = 0; ?>
			<?php foreach ($boards as $board) { ?>
				<a href="#" class="board_selection" board="<?php echo $board['board']; ?>">/<?php echo $board['board']; ?>/ - <?php echo $board['title']; ?></a>
				<br>
				<?php $i++; ?>
			<?php } ?>

		</div>
	</div>
</div>