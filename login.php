<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- login -->

<html>
<?php
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

echo $layout->loadNarrowNav('Login', '');
?>
<!-- Custom styles for this template -->
<link href="bootstrap/dist/css/signin.css" rel="stylesheet">
			
<div class="container">
<div id="wrap">
	<form name="signin" class="form-signin" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
		<h2 class="form-signin-heading">Existing Users</h2>
			<input type="text" class="form-control" placeholder="Email address" autofocus>
			<input type="password" class="form-control" placeholder="Password">
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Remember me
			</label>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
			<span class="help-block">Don't have an account? Click <a href="register.php">here</a> to register for one.</span>
	</form>
	<?php
		if (isset($_POST['submit'])) 
		{
			foreach($_POST as $str)
			{
				echo $str;
				if (empty($str))
				{
					echo '<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><strong>Error!</strong> Please input your email and password to sign in.</p>
						 </div>';
					break;
				}
			}
		}
	?>
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
</html>