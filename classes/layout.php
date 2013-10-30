<?php
//Class for handling the template of the layout of the Views
class Layout
{
	public function loadScrollNavBar($title, $dir)
    {
		$func = " <!DOCTYPE html>
			<html lang='en'>
			<head>
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<meta name='description' content=''>
				<meta name='author' content=''>
				<link rel='shortcut icon' href='". $dir ."bootstrap/assets/ico/favicon.png'>

				<title>". $title ." &middot; Paws For A Cause</title>
	
				<!-- Bootstrap core CSS -->
				<link href='". $dir ."bootstrap/dist/css/bootstrap.css' rel='stylesheet'>

				<!-- Custom styles for this template -->
				<link href='". $dir ."bootstrap/dist/css/navbar-fixed-top.css' rel='stylesheet'>

				<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!--[if lt IE 9]>
				<script src='". $dir ."bootstrap/assets/js/html5shiv.js'></script>
				<script src='". $dir ."bootstrap/assets/js/respond.min.js'></script>
				<![endif]-->
			</head>

			<body>

				<!-- Fixed navbar -->
				<div class='navbar navbar-default navbar-fixed-top'>
					<div class='container'>
						<div class='navbar-header'>
						<button type='button' class='navbar-toggle' data-toggle='collapse' 			data-target='.navbar-collapse'>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='#'>P4C</a>
						</div>
					<div class='navbar-collapse collapse'>
				<ul class='nav navbar-nav'>
				<li class='active'><a href='#'>Home</a></li>
				<li><a href='#about'>About</a></li>
				<li><a href='#contact'>Contact</a></li>
				<li class='dropdown'>
				<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dropdown <b class='caret'></b></a>
				<ul class='dropdown-menu'>
					<li><a href='#'>Action</a></li>
					<li><a href='#'>Another action</a></li>
					<li><a href='#'>Something else here</a></li>
					<li class='divider'></li>
					<li class='dropdown-header'>Nav header</li>
					<li><a href='#'>Separated link</a></li>
					<li><a href='#'>One more separated link</a></li>
				</ul>
				</li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				<li><a href='login.php'>Sign-In</a></li>
				<!-- <li class='active'><a href='./'>Fixed top</a></li> -->
			</ul>
			</div><!--/.nav-collapse -->
		</div>
		</div>";
		
		return $func;
	}
	
	public function loadNarrowNav($title, $dir)
	{
		if ($title == "Home")
		{
			$links = '<li class="active"><a href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="login.php">Sign-In</a></li>';
		}
		else if ($title == "Login")
		{
			$links = '<li><a href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li class="active"><a href="login.php">Sign-In</a></li>';
		}
		else
		{
			$links = '<li><a href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="login.php">Sign-In</a></li>';
		}
		$func = '
		<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="">
				<meta name="author" content="">
				<link rel="shortcut icon" href="'. $dir .'bootstrap/assets/ico/favicon.png">

				<title>'. $title .' &middot; Paws For A Cause</title>

				<!-- Bootstrap core CSS -->
				<link href="'. $dir .'bootstrap/dist/css/bootstrap.css" rel="stylesheet">

				<!-- Custom styles for this template -->
				<link href="'. $dir .'bootstrap/dist/css/jumbotron-narrow.css" rel="stylesheet">
		
		<body>

		<div class="container">
			<div class="header">
				<ul class="nav nav-pills pull-right">
				'. $links .'
				</ul>
				<h3 class="text-muted"><a href="index.php">Paws For A Cause</a></h3>
			</div>';
			
			return $func;
	}
	
	public function loadFooter($dir)
    {
		$func = '
		<div class="footer" id="footer">
			
			<p align="right">&copy; Steven Ng, Jestin Keaton, Zach Nelson 2013</p>
			
		</div>
        </div> <!--/ container -->
		
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="'. $dir .'bootstrap/assets/js/jquery.js"></script>
		<script src="'. $dir .'bootstrap/dist/js/bootstrap.min.js"></script>
		</body>';
		
		return $func;
	}
}
?>