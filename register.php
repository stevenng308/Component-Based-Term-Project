<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- login -->

<html>
<?php
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

echo $layout->loadNarrowNav('Registration', '');
?>
<!-- Custom styles for this template -->
<link href="bootstrap/dist/css/signin.css" rel="stylesheet">
			
<div class="container">
<div id="wrap">
	<form name ="register" class="form-signin" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
		<h2 class="form-signin-heading">New Users</h2>
		<input type="text" class="form-control" name="firstname" id = "firstname" placeholder="First Name" autofocus/>
		<input type="text" class="form-control" name="lastname" id = "lastname" placeholder="Last Name"/>
		<input type="text" class="form-control" name="email" id = "email" placeholder="Email Address"/>
		<input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
		<input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password"/>
		<br />
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Register">Submit</button>
					
	</form>
	<?php
					$escape = true;
					if (isset($_POST['submit'])) 
					{
						foreach($_POST as $str)
						{
							if (empty($str))
							{
								echo '<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<p><strong>Error!</strong> Please completely fill out the registration form.</p>
									 </div>';
								$escape = false;
								break;
							}
						}
						if ($_POST['password'] != $_POST['password2'] && $escape)
						{
							echo '<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<p><strong>Error!</strong> The passwords do not match. Please check your input.</p>
								 </div>';
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