full_url = 'main/get_random_4chan_post';
console.log(full_url);
$.getJSON(full_url, function(data) {
	console.log(data);
});