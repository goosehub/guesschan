$(document).ready(function(){
	$('.board_selection').click(function(){
		if ($('.answer').html() === $(this).attr('board')) {
			alert('Right');
		}
		else {
			alert('Wrong. Answer was /' + $('.answer').html() + '/');
		}
		full_url = 'main/get_random_4chan_post';
		console.log('Get next post');
		$.getJSON(full_url, function(data) {
			console.log(data);
			$('.the_post').html(data.post);
			$('.regular_full_url').attr('href', data.regular_full_url);
			$('.answer').html(data.board);
		});
	});
});