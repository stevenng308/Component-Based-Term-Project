<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- register -->

<html xmlns:fb="http://www.facebook.com/2008/fbml">
<?php

require_once '\AutoLoader.php';

spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();
$database = new Database();

// Function to kill the session, called when user logs out
function deleteSession(){
	// If it's desired to kill the session, also delete the session cookie.	
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]);
	}
	// And now destroy the session
	session_destroy();
	$displayInfo = false;
}

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
						echo '<div class="alert alert-danger">
							<p><strong>Error!</strong> Please completely fill out the registration form.</p>
						 </div>';
						$escape = false;
						return;	
					}
			}
			if ($_POST['password'] != $_POST['password2'] && $escape)
			{
				echo '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p><strong>Error!</strong> The passwords do not match. Please check your input.</p>
					 </div>';
			}
			else if (strlen($_POST['firstname']) > 20 || strlen($_POST['lastname']) > 25 || strlen($_POST['email']) > 50  )
			{
				echo '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p><strong>Error!</strong> One or more of your inputs are too long.</p>
					 </div>';
			}
			else
			{	
				$database->insert($_POST);
				header('location: login.php');	
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