<!-- Paws For A Cause -->
<!-- Author: Jestin Keaton -->
<!-- email_newsletter_signup.php -->

<!DOCTYPE html>
<html>

<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

echo $layout->loadNarrowNav('Home', '');
?>


<?php
	function submitForm(){
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
	}			
?>

<script type="text/javascript">
	$("form").submit(function(){
		var str = $(this).serialize();
		$.ajax('mailchimp_result.php', str, function(result){
			alert(result); // the result variable will contain any text echoed by mailchimp_result.php
		}
		return(false);
	});
</script>
		
<!-- Custom styles for this page-->
<link href="bootstrap/dist/css/jumbotron-narrow.css" rel="stylesheet">
<body>
<div class="container">
	<div id="wrap"> 
		<form action="javascript:void(0);" method="post">
			First name: <input type="text" name="firstname"><br>
			Last name: <input type="text" name="lastname"><br>
			Email: <input type="text" name="email">
			<input type="submit" value="submit" onclick="submitForm()"/>
		</form>
	</div>
</div>
</body>
<?php	  
echo $layout->loadFooter('');
?>
<script src="bootstrap/dist/js/simpleCart.js"></script>

</html>