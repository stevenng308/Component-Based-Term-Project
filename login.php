<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- login -->

<html>
<?php
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();
$database = new Database();
/*($settings = array(
    'oauth_access_token' => "2211183265-mwRk55hkEzsfhaCC2DNSMk052h791tAoSV08LhC",
    'oauth_access_token_secret' => "lXTkcZtXU3hIdt4WWhiJOW8fKuddVeVYqC04HkKWYY",
    'consumer_key' => "4NBWMyfoov3EsMscIBMiw",
    'consumer_secret' => "GS28KcYBKwRitclxt2aP8S6DOCwZTrYpco2gWLc9oc"
);
$twitter = new TwitterAPIExchange($settings);*/

echo $layout->loadNarrowNav('Login', '');
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
			<span class="help-block">Don't have an account? Click <a href="register.php">here</a> to register for one.</span>
	</form>
	<?php
		ob_start();
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_POST['submit'])) 
		{
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
				$_SESSION['sess_username'] = $userData['username'];
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