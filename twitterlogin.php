<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- twitter login -->

<?php
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));
if(!isset($_SESSION)){
	session_start();
}

// The TwitterOAuth instance
$twitteroauth = new TwitterOAuth('4NBWMyfoov3EsMscIBMiw', 'GS28KcYBKwRitclxt2aP8S6DOCwZTrYpco2gWLc9oc');
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$request_token = $twitteroauth->getRequestToken('http://ngine.dyndns.org/classes/twitter_oauth.php');

//var_dump($twitteroauth);
//var_dump($request_token);
// Saving them into the session
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

// If everything goes well..
if($twitteroauth->http_code==200){
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: '. $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    echo 'Something happenend';
}
?>
<html>
<p>Twitter Login</p>
</html>