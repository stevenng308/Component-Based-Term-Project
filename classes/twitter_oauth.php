<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- twitter login callback authenticate -->

<?php
require_once dirname(dirname(__FILE__)).'\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));
if(!isset($_SESSION)){
	session_start();
}
$database = new Database();
if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){
    echo 'Got it.';
	//var_dump($_GET['oauth_verifier']);
	//var_dump($_SESSION['oauth_token']);
	//var_dump($_SESSION['oauth_token_secret']);
	// We've got everything we need
	$twitteroauth = new TwitterOAuth('4NBWMyfoov3EsMscIBMiw', 'GS28KcYBKwRitclxt2aP8S6DOCwZTrYpco2gWLc9oc', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	
	// Let's request the access token
	$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
	// Save it in a session var
	$_SESSION['access_token'] = $access_token;
	// Let's get the user's info
	$user_info = $twitteroauth->get('account/verify_credentials');
	// just a printout of credentials. store these, don't display them.
    //echo "<pre>";
    //var_dump($user_info);
    // valid credentials, provided you give the app access to them.
    //echo "</pre>";
	$database->twitterLogin($user_info, $access_token);
} else {
    // Something's missing, go back to square 1
	echo 'Whoops. Wrong';
	//var_dump($_GET['oauth_verifier']);
	//var_dump($_SESSION['oauth_token']);
	//var_dump($_SESSION['oauth_token_secret']);
    header('Location: ../login.php');
}
?>