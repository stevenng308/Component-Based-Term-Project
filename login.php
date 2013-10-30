<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- login -->

<html>
<?php
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

$layout = new Layout();

$error = $_GET['retry']; //triggers error message for unfilled fields
echo $layout->loadNarrowNav('Login', '');
?>
<!-- Custom styles for this template -->
<link href="bootstrap/dist/css/signin.css" rel="stylesheet">
			
<div class="container">
<div id="wrap">
	<table align="center" width="100%">
		<tr>
			<td>
				<form name ="register" class="form-signin" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
					<h2 class="form-signin-heading">New Users</h2>
					<input type="text" class="form-control" name="firstname" id = "firstname" placeholder="First Name" autofocus/>
					<input type="text" class="form-control" name="lastname" id = "lastname" placeholder="Last Name"/>
					<input type="text" class="form-control" name="email" id = "email" placeholder="Email Address"/>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
					<input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password"/>
					<br />
					<?php
					$escape = true;
					if (isset($_POST['submit'])) 
					{
						foreach($_POST as $str)
						{
							if (empty($str))
							{
								//echo '<span class="help-block"<p style="color:red" align ="center"><i>Please completely fill the<br />registration form.<i></p></span>';
								$escape = false;
								break;
							}
						}
						if ($_POST['password'] != $_POST['password2'] && $escape)
						{
							echo '<span class="help-block"<p style="color:red" align ="center"><i>The passwords are not correct.<i></p></span>';
						}
					}
					?>
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Register">Submit</button>
					
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