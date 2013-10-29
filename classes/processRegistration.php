<?php
//retrieve data from the POST variable
foreach($_POST as $str)
{
	if ($str == "")
	{
		echo "It didn't worked <br />";
		header('Location: ../login.php?retry=1');
	}
	else
	{
		
		echo "It did work <br />";
		echo $str;
	}
}
?>