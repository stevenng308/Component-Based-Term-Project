/* Paws For A Cause //
// Author: Zach Nelson //
// script.php */

$(document).ready(function(){

	$('#photos').jflickrfeed({
		limit: 12,
		qstrings: {
			id: '109885256@N08'
		},
		itemTemplate: 
		'<li>' +
			'<a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a>' +
		'</li>'
	});
	
});