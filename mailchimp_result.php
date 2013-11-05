<!-- Paws for a Cause -->
<!-- Author: Jestin Keaton -->
<!-- mailchimp_result.php -->

<?php

$apikey = '131f5473caf0c3ac30e5dc897984e00f-us3';
$merges = array('FNAME'=>$firstname,'LNAME'=>$lastname);
$double_optin=true;
$update_existing=false;
$replace_interests=true;
$send_welcome=false;
$email_type = 'html';
$data = array(
		'email_address' => $email,
		'apikey' => $apikey,
		'merge_vars' => $merges,
		'id' => $listId,
		'double_optin' => $double_optin,
		'update_existing' => $update_existing,
		'replace_interests' => $replace_interests,
		'send_welcome' => $send_welcome,
		'email_type' => $email_type
	);
	
$payload = json_encode($data);

$submit_url = "http://us3.api.mailchimp.com/1.3/?method=listSubscribe";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));

$result = curl_exec($ch);

curl_close ($ch);

$data = json_decode($result);
if($data->error){
	echo $data->code .' : '.$data->error."\n";
}
else{
	echo "success, look for the confirmation message\n";
}
				
?>