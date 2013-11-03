<?php
session_start();
session_destroy();
echo '<div align="center">
		<b>Signing-out successful!</b><br />
		<b>Redirecting to main page...</b>
		</div>';
header('Refresh: 2; URL=" ../index.php"');
exit;
?>