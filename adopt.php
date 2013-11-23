<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- adopt -->

<html>
<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

session_start();
$layout = new Layout();
$loggedIn = false;
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) 
{
	$loggedIn = true;
}
echo $layout->loadNarrowNav('Adopt', '');
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
			<p class="lead">Adopt a paws in need and you will find a new bond with your new furry companion. Register a new account or sign in with your existing account.</p>
			<p><a class="btn btn-lg btn-success" href="register.php">Sign up today</a></p>
		</div>
		';
	}
	else
	{
		echo '<div class="page-header">
			<h1 align="center">Welcome to Paws For A Cause!</h1>
			</div>';
	}
?>
	<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/akita.jpeg" alt="Akita">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3 class="item_name">CoolDog
						<span class="item_price">$49.99</span></h3>
						<p>Cooldog is very cool and chill. The fluffy white coat will relax your anxieties away.</p>
						<span class="label label-info">ChilliDog</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/shiba.jpg" alt="Shiba Inuko">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3 class="item_name">Dawg
						<span class="item_price">$649.99</span></h3>
						<p>Dawg is rambunctious and always energetic. If you want to stay fit Dawg is the man.</p>
						<span class="label label-danger">YoDawg</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/densuke.png" alt="Densuke ;_;">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3 class="item_name">BroDog
						<span class="item_price">$249.99</span></h3>
						<p>BroDog is a bit quirky and won't win any contests, but he is your best friend no matter who you are. He is will be your wingman through thick or thin.</p>
						<span class="label label-default">Densuke...</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/ein.jpg" alt="Akita">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3 class="item_name">iDog
						<span class="item_price">$299.99</span></h3>
						<p>iDog is quiet and enigmatic. He can play a mean game of chess. Might have dangerous men coming for him.</p>
						<span class="label label-warning">SmartPuppy</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/kraken.jpg" alt="lobster">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3 class="item_name">LobsterCorgi
						<span class="item_price">$199.99</span></h3>
						<p>A Corgi in a lobster costume.</p>
						<span class="label label-danger">SpicyDog</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/catdog.jpg" alt="dogcat">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3 class="item_name">CatDog
						<span class="item_price">$109.99</span></h3>
						<p>Dog is a hyper and energetic dog. Can cough up furballs. Comes with a free cat.</p>
						<span class="label label-warning">FreeCat</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
		</div>
		
	<!--<div class="row marketing">
		<div class="col-lg-6">
			<div class="simpleCart_shelfItem">
				<h3 class="item_name">Dog <span class="item_price">$35.99</span></h3>

				<a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a>
			</div>
			<div class="simpleCart_shelfItem">
				<h3 class="item_name">A Dog <span class="item_price">$13.99</span></h3>

				<a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a>
			</div>

			<div class="simpleCart_shelfItem">
				<h3 class="item_name">The Dog <span class="item_price">$0.99</span></h3>

				<a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="simpleCart_shelfItem">
				<h3 class="item_name">iDog <span class="item_price">$149.99</span></h3>

				<a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a>
			</div>

			<div class="simpleCart_shelfItem">
				<h3 class="item_name">myDog <span class="item_price">$3.99</span></h3>

				<a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a>
			</div>

			<div class="simpleCart_shelfItem">
				<h3 class="item_name">CatDog <span class="item_price">$509.99</span> <span class="label label-danger">HotDog</span></h3>

				<a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a>
			</div>
		</div>

	</div>-->
	
	<!--push div to push the footer down-->
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
</html>