<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once '\AutoLoader.php';
require 'facebook-php-sdk-master/facebook-php-sdk-master/src/facebook.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$_POST_VARS = array(
	'firstname' => '',
	'lastname' => '',
	'email' => '',
	'password' => '',
	'password2' => '');

$layout = new Layout();
$database = new Database();
// The TwitterOAuth instance

echo $layout->loadNarrowNav('Login', '');

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '675454145821609',
  'secret' => '7c48be141987557485d00052b1b7ed55',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

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

// Login or logout url will be needed depending on current user state.
if ($user) {
	$params = array( 'next' => 'http://ngine.dyndns.org/' );
	$logoutUrl = $facebook->getLogoutUrl($params);
} else {
	$statusUrl = $facebook->getLoginStatusUrl();
	$loginUrl = $facebook->getLoginUrl(array("scope" => "email"));
}

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

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Facebook Login</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h2 class="form-signin-heading">Facebook Login Page</h2>

    <?php if ($user): ?>
		<a href="http://localhost/xampp/Component-Based-Term-Project/" onclick="deleteSession(); FB.logout();">Logout</a>
    <?php else: ?>
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
    <?php endif ?>

    <?php if ($user): ?>
		<h3>Greetings <?php echo $user_profile['first_name'];echo ' '; echo $user_profile['last_name'];?>, you are currently logged in.</h3>
		<img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
		<?php $_POST_VARS['firstname'] = $user_profile['first_name']; ?>
		<?php $_POST_VARS['lastname'] = $user_profile['last_name']; ?>
		<?php $_POST_VARS['email'] = ($user_profile['first_name']+$user_profile['last_name']+"@"+$user_profile['id']); ?>
		<?php $_POST_VARS['password'] = $user_profile['id']; ?>
		<?php $_POST_VARS['password2'] = $user_profile['id']; ?>
		<?php $database->insert($_POST_VARS); ?>
		<?php
		// Added facebook check to see if the current user is already in the database
		$email1 = ($user_profile['first_name']+$user_profile['last_name']+"@"+$user_profile['id']);
		$query_initial = "SELECT id, firstname, lastname, password, email, salt FROM member WHERE email = '$email1';";
		$result_initial = mysql_query($query_initial);
		
		if(mysql_num_rows($result_initial) != 0){
			$userData = mysql_fetch_array($result_initial, MYSQL_ASSOC);
			session_regenerate_id();
			$_SESSION['sess_user_id'] = $userData['id'];
			$_SESSION['sess_username'] = $user_profile['first_name']." ".$user_profile['last_name'];
			session_write_close();
			header('Location: index.php');
		}?>
		
    <?php else: ?>
		<br />
		<strong><em>You are not Connected.</em></strong>
    <?php endif ?>

	
	<!-- Custom styles for this template -->
	<link href="bootstrap/dist/css/signin.css" rel="stylesheet">
<?php	  
echo $layout->loadFooter('');
?>
</html>
