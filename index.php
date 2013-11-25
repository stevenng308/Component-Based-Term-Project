<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- index -->

<html>
<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

if(!isset($_SESSION)){
	session_start();
}
$layout = new Layout();
$loggedIn = false;
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) 
{
	$loggedIn = true;
}
echo $layout->loadNarrowNav('Home', '');
if(isset($_SESSION)){
	if(array_key_exists( 'sess_username',$_SESSION )){
		$uname = $_SESSION['sess_username'];
		if($uname)
			echo "<div style='text-align:right'><h4>Welcome ". $uname ."</h4></div>";
	}
}
?>
<!-- Custom styles for this page-->
<link href="bootstrap/dist/css/jumbotron-narrow.css" rel="stylesheet">
<div class="container">
	<div id="wrap"> <!-- wraps the main div in its own section so it stays where it needs to be-->
	<!--<div align="right">
		<span class="badge"><span class="simpleCart_quantity"></span></span><strong> items - <span class="simpleCart_total"></span></strong><br />
		<a href="javascript:;" class="btn btn-sm btn-primary simpleCart_empty">Empty Cart</a>
		<a href="javascript:;" class="btn btn-sm btn-success simpleCart_checkout">Checkout</a>
		<button type="button" class="btn btn-primary" data-container="body" data-toggle="popover" 
		data-placement="bottom" data-content="" data-original-title="" title="">
        <strong><span class="simpleCart_quantity"></span> items - <span class="simpleCart_total"></span></strong>&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>
        </button> 
	</div> <br />-->
<?php
	//echo $loggedIn;
	if (($loggedIn))
	{	echo '
		<div class="jumbotron">
			<h1>Welcome to<br /> Paws For A Cause!</h1>
			<p class="lead">Adopt a paws in need and you will find a new bond with your new furry companion. Register an account or sign in with your existing account.</p>
			<p><a class="btn btn-lg btn-success" href="register.php">Sign up today</a></p>
		</div>
		';
	}
	else
	{
		echo '<div class="jumbotron">
			<h1>Welcome to<br /> Paws For A Cause!</h1>
			<p class="lead">Thank you for registering. To view the list of companions that are looking for a new home and friend, please click the button below.</p>
			<p><a class="btn btn-lg btn-success" href="adopt.php">Adopt Today</a></p>
		</div>';
	}
?>
	<div class="jumbotron">
		<iframe width="560" height="315" src="//www.youtube.com/embed/uORygjlWQYE?list=PL_On2uzbBrcZEvw1To-Rv7gshsAb6CYsB" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="jumbotron" id="content" align="center">
	</div>
	<!--push div to push the footer down-->
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
<script src="bootstrap/dist/js/loadphp.js"></script>
</html>