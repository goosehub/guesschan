$(document).ready(function(){
	console.log('No need to cheat with inspect element. Just click the post number to view the post');
	$('.board_selection').click(function(){
		$('.last_answer_parent').show();
		$('.last_answer_board').html('/' + $('.answer_board_abbr').html() + '/' + ' - ' + $('.answer_board_title').html());
		$('.last_answer_link').attr('href', $('.answer_link').html());
		if ($('.answer_board_abbr').html() === $(this).attr('board')) {
			$('.last_answer_status').html('Right!');
			$('.last_answer_status').removeClass('wrong_status').addClass('right_status');
			$('.right_number').html(parseInt($('.right_number').html()) + 1);
		}
		else {
			$('.last_answer_status').html('WRONG!');
			$('.last_answer_status').removeClass('right_status').addClass('wrong_status');
			$('.wrong_number').html(parseInt($('.wrong_number').html()) + 1);
		}

		$('.total_number').html(parseInt($('.total_number').html()) + 1);
		full_url = 'main/get_random_4chan_post';
		console.log('Get next post');
		$.getJSON(full_url, function(data) {
			console.log(data);
			$('.the_post').html(data.post);
			$('.post_link').attr('href', data.link);
			$('.answer_link').html(data.link);
			$('.answer_board_abbr').html(data.board_abbr);
			$('.answer_board_title').html(data.board_title);
		});
	});
});