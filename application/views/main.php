<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-push-2">
			<h1 class="text-center">GuessChan</h1>

			<hr>
			<span class="greentext_this"><?php echo $random['post']; ?></span>
			<br>
			<hr>
			<a target="_blank" href="<?php echo $random['regular_full_url']; ?>">View this post</a>
			<hr>
			<?php $i = 0; ?>
			<?php foreach ($boards as $board) { ?>
				<a href="#">/<?php echo $board['board']; ?>/ - <?php echo $board['title']; ?></a>
				<br>
				<?php $i++; ?>
			<?php } ?>

		</div>
	</div>
</div>