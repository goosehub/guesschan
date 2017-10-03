<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-push-2">
			<h1 class="text-center">GuessChan</h1>
			<hr>
			<span class="the_post"><?php echo $random['post']; ?></span>
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