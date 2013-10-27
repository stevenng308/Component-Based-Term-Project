<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- login -->

<html>
<?php
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

echo $layout->loadNarrowNav('Login', '');
?>
<!-- Custom styles for this template -->
<link href="bootstrap/dist/css/signin.css" rel="stylesheet">
			
<div class="container">
<div id="wrap">
	<table align="center" width="100%">
		<tr>
			<td>
				<form class="form-signin">
					<h2 class="form-signin-heading">New Users</h2>
					<input type="text" class="form-control" name="first_name" id = "first_name" placeholder="First Name" autofocus/>
					<input type="text" class="form-control" name="last_name" id = "last_name" placeholder="Last Name"/>
					<input type="text" class="form-control" name="email" id = "email" placeholder="Email Address"/>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
				</form>
			</td>
			<td valign="top">
				<form class="form-signin">
					<h2 class="form-signin-heading">Existing Users</h2>
					<input type="text" class="form-control" placeholder="Email address" autofocus>
					<input type="password" class="form-control" placeholder="Password">
					<label class="checkbox">
						<input type="checkbox" value="remember-me"> Remember me
					</label>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
			</td>
		</tr>
	</table>
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
</html>