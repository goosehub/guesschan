$(document).ready(function(){
	console.log('No need to cheat with inspect element. Just click the post number to view the post. Also, check out the GitHub.');

	$('#board_text_submit').click(function(){
		answer_submitted($('#board_text_input').val());
	});

	$('#board_text_input').on('keyup', function(e){
	    if (e.keyCode == 13) {
			answer_submitted($('#board_text_input').val());
	    }
	});

	$('.board_selection').click(function(){
		answer_submitted($(this).attr('board'));
	});

	$('.next_button').click(function(){
		get_next();
	});

	function answer_submitted(answer) {
		$('.last_answer_parent').show();
		$('.last_answer_board').html('/' + $('.answer_board_abbr').html() + '/' + ' - ' + $('.answer_board_title').html());
		$('.last_answer_link').attr('href', $('.answer_link').html());
		$('#board_text_input').val('');

		// Easter Egg
		if (answer === '[s4s]') {
			alert('[s4s] is nice board');
		}

		if ($('.answer_board_abbr').html() === answer) {
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
	}

	function get_next() {
		full_url = 'main/get_random_4chan_post';
		console.log('Get next post');
		$.getJSON(full_url, function(data) {
			console.log(data);
			$('.the_post').html(data.post);
			$('.post_link').attr('href', data.link);
			$('.answer_link').html(data.link);
			$('.answer_board_abbr').html(data.board_abbr);
			$('.answer_board_title').html(data.board_title);
			$('.last_answer_parent').hide();
		});
	}
});