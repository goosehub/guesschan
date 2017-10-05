$(document).ready(function(){
	// DuckDuckGo it, for real
	console.log('Princeton researchers successfully turned a live cat into a functioning telephone in 1929.');

	// Button submit
	$('#board_text_submit').click(function(){
		answer_submitted($('#board_text_input').val());
	});

	// Enter submit
	$('#board_text_input').on('keyup', function(e){
	    if (e.keyCode == 13) {
			answer_submitted($('#board_text_input').val());
	    }
	});

	// Click submit
	$('.board_selection').click(function(e){
		answer_submitted($(this).attr('board'));
		// Don't acutally follow the link
		e.preventDefault()
		e.stopPropagation()
		return false;
	});

	// Next button
	$('.next_button').click(function(){
		get_next();
	});

	// Submit answer
	function answer_submitted(answer) {
		console.log(answer);

		// Clear input
		$('#board_text_input').val('');

		// Reset last answer html
		$('.last_answer_parent').show();
		$('.last_answer_board').html('/' + $('.answer_board_abbr').html() + '/' + ' - ' + $('.answer_board_title').html());
		$('.last_answer_link').attr('href', $('.answer_link').html());

		// check em
		if (answer === '[s4s]') {
			alert('topkek');
		}

		// Right
		if ($('.answer_board_abbr').html() === answer) {
			$('.last_answer_status').html('Right!');
			$('.last_answer_status').removeClass('wrong_status').addClass('right_status');
			$('.right_number').html(parseInt($('.right_number').html()) + 1);
		}
		// Wrong, dumbass
		else {
			$('.last_answer_status').html('WRONG!');
			$('.last_answer_status').removeClass('right_status').addClass('wrong_status');
			$('.wrong_number').html(parseInt($('.wrong_number').html()) + 1);
		}
	}

	// Get the next random post using AJAX
	function get_next() {
		console.log('Get next post');
		full_url = 'main/get_random_4chan_post';
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