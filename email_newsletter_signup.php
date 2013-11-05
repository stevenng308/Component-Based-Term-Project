<!-- Paws For A Cause -->
<!-- Author: Jestin Keaton -->
<!-- email_newsletter_signup.php -->

<html>
<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

echo $layout->loadNarrowNav('Home', '');
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
<div class="container">
	<div id="wrap"> 
		<form action="javascript:void(0);" method="post">
			First name: <input type="text" name="firstname"><br>
			Last name: <input type="text" name="lastname"><br>
			Email: <input type="text" name="email">
			<input type="submit" value="submit" />
		</form>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
<script src="bootstrap/dist/js/simpleCart.js"></script>

</html>