<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- login -->

<html xmlns:fb="http://www.facebook.com/2008/fbml">
<?php
require_once '\AutoLoader.php';
require 'facebook-php-sdk-master/facebook-php-sdk-master/src/facebook.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();
$database = new Database();
// The TwitterOAuth instance

echo $layout->loadNarrowNav('Login', '');

// Added for Facebook functionality
$facebook = new Facebook(array(
  'appId'  => '675454145821609',
  'secret' => '7c48be141987557485d00052b1b7ed55',
));
$user = $facebook->getUser();
$access_token = $facebook->getAccessToken();
if ($user){
	try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
	}	 
	catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}
if ($user) {
	$params = array( 'next' => 'http://ngine.dyndns.org/' );
	$logoutUrl = $facebook->getLogoutUrl($params);
} else {
	$statusUrl = $facebook->getLoginStatusUrl();
	$loginUrl = $facebook->getLoginUrl(array("scope" => "email"));
}
// end of fb stuff

?>
<!-- Custom styles for this template -->
<link href="bootstrap/dist/css/signin.css" rel="stylesheet">
			
<div class="container">
<div id="wrap">
	<form name="signin" class="form-signin" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
		<h2 class="form-signin-heading">Existing Users</h2>
			<input type="text" class="form-control" name="email" id = "email" placeholder="Email address" autofocus>
			<input type="password" class="form-control" name="password" id = "password" placeholder="Password">
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Remember me
			</label>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button> 
			<br />
			<div class="row">
			  <div class="col-md-6"><a href="twitterlogin.php" target="_blank"><img src="images/login_twitter.png" alt="Login with Twitter"></a></div>
			  <div class="col-md-6"><a href="fblogin.php"><img src="images/login_fb.png" alt="Login with Facebook"></a></div>
			</div>
			<span class="help-block">Don't have an account? Click <a href="register.php">here</a> to register for one.</span>
	</form>
	<?php
		ob_start();
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_POST['submit']) || $user) 
		{
			if($user){
				// Added facebook check to see if the current user is already in the database
				$email1 = ($user_profile['first_name']+$user_profile['last_name']+"@"+$user_profile['id']);
				$query_initial = "SELECT id, firstname, lastname, password, email, salt FROM member WHERE email = '$email1';";
				$result_initial = mysql_query($query_initial);
				
				if(mysql_num_rows($result_initial) != 0){
					$userData = mysql_fetch_array($result_initial, MYSQL_ASSOC);
					session_regenerate_id();
					$_SESSION['sess_user_id'] = $userData['id'];
					$_SESSION['sess_username'] = ($userData['firstname']+" "+$userData['lastname']);
					session_write_close();
					header('Location: index.php');
				}
			}
			
			
			if (empty($_POST['email']) || empty($_POST['password']))
			{
				//echo $str;
				echo '<div class="alert alert-danger">
					<p><strong>Error!</strong> Please input your email and password to sign in.</p>
					 </div>';
				return;
			}
			
			//echo 'Past empty';
			$email = $_POST['email'];
			$email= mysql_real_escape_string($email);
			$password = $_POST['password'];
			
			//check if email exists
			$query = "SELECT id, firstname, lastname, password, email, salt FROM member WHERE email = '$email';";
			$result = mysql_query($query);
			if(mysql_num_rows($result) == 0) // User not found.
			{
				echo '<div class="alert alert-danger">
					<p><strong>Error!</strong> Invalid email address. Please input your correct login information.</p>
				 </div>';
				return;
			}
			//check if password correct
			$userData = mysql_fetch_array($result, MYSQL_ASSOC);
			$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
			//echo $userData['salt'] . '<br />';
			//echo $hash . '<br />';
			//echo $userData['password'];
			if($hash != $userData['password']) // Incorrect password.
			{
				echo '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p><strong>Error!</strong> Invalid email address or password. Please input your correct login information.</p>
				 </div>';
			}
			else
			{
				//$database->login($userData);
				session_regenerate_id();
				$_SESSION['sess_user_id'] = $userData['id'];
				$_SESSION['sess_username'] = $userData['firstname']. " ". $userData['lastname'];
				session_write_close();
				header('Location: index.php');
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