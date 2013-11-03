<?php
require_once dirname(dirname(__FILE__)) .'\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$database = new Database();
//retrieve data from the POST variable
include('../register.php');
foreach($_POST as $str)
{
	echo $str;
	/*if ($str == "")
	{
		echo "It didn't worked <br />";
		header('Location: ../login.php?retry=1');
	}
	else
	{
		
		echo "It did work <br />";
		echo $str;
	}
	
	if ($_POST['password'] == $_POST['password2'])
	{
		echo 'Password is correct.';
	}
	else
	{
		echo '<script type="text/javascript">alert("Incorrect password.");</script>';
	}*/
}
?>