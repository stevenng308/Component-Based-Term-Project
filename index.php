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
	<div align="right">
		<span class="badge"><span class="simpleCart_quantity"></span></span><strong> items - <span class="simpleCart_total"></span></strong><br />
		<a href="javascript:;" class="btn btn-sm btn-primary simpleCart_empty">Empty Cart</a>
		<a href="javascript:;" class="btn btn-sm btn-success simpleCart_checkout">Checkout</a>
	</div>

	<div class="jumbotron">
        <h1>Welcome to<br /> Paws For A Cause!</h1>
        <p class="lead">Adopt a paws in need and you will find a new bond with your new furry companion. Register a new account or sign in with your existing account.</p>
        <p><a class="btn btn-lg btn-success" href="register.php">Sign up today</a></p>
    </div>
	<div class="row marketing">
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
	</div>
	<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img data-src="holder.js/300x200" alt="...">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3>CoolDog</h3>
						<span class="item_price">$49.99</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img data-src="holder.js/300x200" alt="...">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3>Dawg</h3>
						<span class="item_price">$409.99</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img data-src="holder.js/300x200" alt="...">
					<div class="caption">
					<div class="simpleCart_shelfItem">
						<h3>BroDog</h3>
						<span class="item_price">$109.99</span>
						<p><a href="javascript:;" class="btn btn-sm btn-primary item_add"> Add to Cart </a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
					</div>
				</div>
			</div>
		</div>
	<!--push div to push the footer down-->
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
<script src="bootstrap/dist/js/simpleCart.js"></script>

</html>