<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>

<?php
	require_once 'google-api-php-client/src/Google_Client.php';
	require_once 'google-api-php-client/src/contrib/Google_PlusService.php';
	require_once '\AutoLoader.php';
	
	spl_autoload_register(array('AutoLoader', 'autoLoad'));
	
	$layout = new Layout();
	$database = new Database();
	
	echo $layout->loadNarrowNav('Login', '');
	
	session_start();

	$_POST = array(
	'firstname' => '',
	'lastname' => '',
	'email' => '',
	'password' => '',
	'password2' => '');
	
	if (isset($_GET['state']) && $_SESSION['state'] != $_GET['state']) {
	  header('HTTP/ 401 Invalid state parameter');
	  exit;
	}

	$client = new Google_Client();
	$client->setApplicationName('Google+ server-side flow');
	$client->setClientId('1090036562408.apps.googleusercontent.com');
	$client->setClientSecret('GAVce3pfKfPIn49P08SztUnq');
	$client->setRedirectUri('http://localhost/xampp/Component-Based-Term-Project/');
	$client->setDeveloperKey('YOUR_SIMPLE_API_KEY');
	$plus = new Google_PlusService($client);

	if (isset($_GET['code'])) {
	  $client->authenticate();
	  // Get your access and refresh tokens, which are both contained in the
	  // following response, which is in a JSON structure:
	  $jsonTokens = $client->getAccessToken();
	  $_SESSION['token'] = $jsonTokens;
	 
		$_POST['firstname'] = ''; 
		$_POST['lastname'] = ''; 
		$_POST['email'] = substr($_SESSION['userId'],50); 
		$_POST['password'] = ''; 
		$_POST['password2'] = ''; 
		$database->insert($_POST); 

		// Added facebook check to see if the current user is already in the database
		$email1 = substr($_SESSION['token'],50);
		$query_initial = "SELECT id, firstname, lastname, password, email, salt FROM member WHERE email = '$email1';";
		$result_initial = mysql_query($query_initial);
		
		if(mysql_num_rows($result_initial) != 0){
			$userData = mysql_fetch_array($result_initial, MYSQL_ASSOC);
			session_regenerate_id();
			$_SESSION['sess_user_id'] = $_SESSION['token'];
			$_SESSION['sess_username'] = $_SESSION['token'];
			session_write_close();
			header('Location: index.php');
		}
		session_write_close();
	  // Store the tokens or otherwise handle the behavior now that you have
	  // successfully connected the user and exchanged the code for tokens. You
	  // will likely redirect to a different location in your app at thsi point.
	  $redirect = 'http://example.com/myaccount';
	  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
	}
?>
	
<script type="text/javascript">
$(document).ready(function() {
  $('#signInButton').click(function() {
    $(this).attr('href','https://accounts.google.com/o/oauth2/auth?scope=' +
      'https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fplus.login&' +
      'state=generate_a_unique_state_value&' +
      'redirect_uri=http://localhost/xampp/Component-Based-Term-Project/&'+
      'response_type=code&' +
      'client_id=1090036562408.apps.googleusercontent.com&' +
      'access_type=offline');
      return true; // Continue with the new href.
  });
});
</script>

<html>
<head>
  
</head>
<body>
	<div><a href="#" id="signInButton">Sign in with Google</a></div>
	<?php	  
		echo $layout->loadFooter('');
	?>
</body>
</html>