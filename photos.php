<!-- Paws For A Cause -->
<!-- Author: Zach Nelson -->
<!-- photos.php -->

<html>
<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

echo $layout->loadNarrowNav('Photos', '');
?>
<!-- Custom styles for this page-->
<link href="bootstrap/dist/css/jumbotron-narrow.css" rel="stylesheet">
<link href="css/jflickfeed.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jflickrfeed.js"  type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>

<div class="container">
	<div id="wrap"> <!-- wraps the main div in its own section so it stays where it needs to be-->
		<div id="photos" align="center">
			<!-- div loads from jflickrfeed.js-->
			<object width="100%" height="450"> 
				<param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F109885256%40N08%2Fsets%2F72157638072963065%2Fshow%2F&page_show_back_url=%2Fphotos%2F109885256%40N08%2Fsets%2F72157638072963065%2F&set_id=72157638072963065&jump_to=">
				</param> 
				<param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=138195"></param> <param name="allowFullScreen" value="true">
				</param>
				<embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=138195" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F109885256%40N08%2Fsets%2F72157638072963065%2Fshow%2F&page_show_back_url=%2Fphotos%2F109885256%40N08%2Fsets%2F72157638072963065%2F&set_id=72157638072963065&jump_to=" width="400" height="300">
				</embed>
			</object>
		</div>
			<!--push div to push the footer down-->
		<div id="push">
		</div>
	</div>
</div>

<?php	  
echo $layout->loadFooter('');
?>

<script src="bootstrap/dist/js/loadphp.js"></script>
</html>