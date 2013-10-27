<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- index -->

<html>
<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

echo $layout->loadNarrowNav('Home', '');
?>
<!-- Custom styles for this page-->
<link href="bootstrap/dist/css/jumbotron-narrow.css" rel="stylesheet">
<div class="container">
	<div id="wrap"> <!-- wraps the main div in its own section so it stays where it needs to be-->
	<div class="jumbotron">
        <h1>Welcome to<br /> Paws For A Cause!</h1>
        <p class="lead">Adopt a paws in need and you will find a new bond with your new furry companion. Register a new account or sign in with your existing account.</p>
        <p><a class="btn btn-lg btn-success" href="login.php">Sign up today</a></p>
    </div>

	<div class="row marketing">
		<div class="col-lg-6">
			<h4>Subheading</h4>
			<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

			<h4>Subheading</h4>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

			<h4>Subheading</h4>
			<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
		</div>

		<div class="col-lg-6">
			<h4>Subheading</h4>
			<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

			<h4>Subheading</h4>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

			<h4>Subheading</h4>
			<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
		</div>
	</div>
	<!--push div to push the footer down-->
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
</html>