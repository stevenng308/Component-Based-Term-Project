<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- page for code -->

<html>
<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

if(!isset($_SESSION)){
	session_start();
}
$layout = new Layout();
$loggedIn = false;
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) 
{
	$loggedIn = true;
}
echo $layout->loadNarrowNav('Home', '');
?>

<div class="container">
	<div id="wrap"> <!-- wraps the main div in its own section so it stays where it needs to be-->
		<div class="panel-group" id="accordion">
		  <div class="panel panel-primary">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				  simplecartJS API
				</a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in">
			  <div class="panel-body">
				<div class="well well-small">
				<strong>Displaying # of items in the cart:</strong><br>
				&lt;span class="simpleCart_quantity"&gt;&lt;/span&gt;<br>
				<br>
				<strong>Displaying total price:</strong><br>
				&lt;span class="simpleCart_total"&gt;&lt;/span&gt;<br>
				<br>
				<strong>Empty shopping cart:</strong><br>
				&lt;a href="javascript:;" class="simpleCart_empty"&gt;Empty Cart&lt;/a&gt;<br>
				<br>
				<strong>Checkout using paypal:</strong><br>
				&lt;a href="javascript:;" class="simpleCart_checkout"&gt;Checkout&lt;/a&gt;<br>
				<br>
				<strong>Viewing shopping cart items:</strong><br>
				&lt;div class="simpleCart_items"&gt;&lt;/div&gt;<br>
				<br>
				<strong>Script to format and display the correct info about the items</strong><br>
				&lt;script&gt;<br>
					simpleCart({<br>
						//Setting the Cart Columns for the sidebar cart display.<br>
						cartColumns: [<br>
							{ attr: "image", label: false, view: "image"},<br>
							//Name of the item<br>
							{ attr: "name" , label: "Name" },<br>
							//Quantity displayed as an input<br>
							{ attr: "quantity", label: "Quantity", view: "input"},<br>
							//Built in view for a remove link<br>
							{ view:'remove', text: "Remove", label: false},<br>
							//Price of item<br>
							{ attr: "price", label: "Price"},<br>
							//Subtotal of that row (quantity of that item * the price)<br>
							{ attr: "total" , label: "Subtotal", view: "currency"  }<br>
						],<br>
						cartStyle: "table"<br>
					});<br>
				&lt;/script&gt;<br><br>
				<a href="code for API/shoppingcart.txt">Link to TXT</a>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-warning">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				  RSS2HTML API
				</a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse">
			  <div class="panel-body">
				<div class="well well-small">
				<strong>Displaying the rss feed from another site:</strong><br>
				rss2html/rss2html.php?XMLFILE=http://rss.animalnetwork.com/dogchannel/Dog-Adoption-Information.rss
				<br><br>
				<a href="code for API/rss2.txt">Link to TXT</a>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
				  MailChimp API
				</a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse">
			  <div class="panel-body">
				<div class="well well-small">
					<strong>Basically just pass a POST array to this address</strong><br>
					action="http://spsu.us3.list-manage.com/subscribe/post"<br>
					<br>
					<strong>The registration form:</strong><br>
					&lt;form form name="signin" class="form-signin" action="http://spsu.us3.list-manage.com/subscribe/post" method="POST"&gt;<br>
							&lt;input type="email" class="form-control" name="MERGE0" id="MERGE0"  placeholder="Email address" autofocus&gt;<br>
							&lt;input type="text" class="form-control" name="MERGE1" id="MERGE1" placeholder="First Name" value=""&gt;<br>
							&lt;input type="text" class="form-control" name="MERGE2" id="MERGE2" placeholder="Last Name" value=""&gt;<br>
							&lt;strong>Preferred format&lt;/strong&gt;<br>
								&lt;div class="radio"&gt;<br>
								  &lt;label&gt;<br>
									&lt;input type="radio" name="EMAILTYPE" id="EMAILTYPE_HTML" value="html" checked&gt;<br>
									HTML<br>
								  &lt;/label&gt;<br>
								&lt;/div&gt;<br>
								&lt;div class="radio"&gt;<br>
								  &lt;label&gt;<br>
									&lt;input type="radio" name="EMAILTYPE" id="EMAILTYPE_TEXT" value="text"&gt;<br>
									TEXT<br>
								  &lt;/label&gt;<br>
								&lt;/div&gt;<br>
							&lt;input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Subscribe to list"&gt;<br>
						&lt;/form&gt;<br>
						<br>
					<strong>Some scripts were provided for error checking.</strong>
					<br><br>
					<a href="code for API/mailchimp.txt">Link to TXT</a>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-info">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
				  Twitter API 1.1
				</a>
			  </h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse">
			  <div class="panel-body">
				<div class="well well-small">
					<strong>Create a new twitterOAuth object to handle the login:</strong><br>
					$twitteroauth = new TwitterOAuth('YOUR CONSUMER KEY', 'YOUR CONSUMER SECRET')<br>
					<br>
					<strong>Direct user to twitter login site:</strong><br>
					$twitteroauth->getAuthorizeURL($request_token['oauth_token']);</strong><br>
					<br>
					<strong>Twitter calls back using this and get the user's info:</strong><br>
					$twitteroauth->getRequestToken('http://ngine.dyndns.org/0000/twitter_oauth.php');<br>
					<br>
					<strong>Get the twitter access tokens:</strong><br>
					$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);<br>
					<br>
					<strong>Accessing the user's info:</strong><br>
					$user_info = $twitteroauth->get('account/verify_credentials');<br>
					<br>
					http://stackoverflow.com/questions/14502411/why-is-my-twitter-oauth-access-token-invalid-expired<br>
					http://net.tutsplus.com/tutorials/php/how-to-authenticate-users-with-twitter-oauth/<br>
					<br>
					<a href="code for API/twitter API.txt">Link to TXT</a>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-danger">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
				  Youtube Playlist
				</a>
			  </h4>
			</div>
			<div id="collapseFive" class="panel-collapse collapse">
			  <div class="panel-body">
				<div class="well well-small">
					<strong>Embed Link</strong><br>
					&lt;iframe width="560" height="315" src="//www.youtube.com/embed/uORygjlWQYE?list=PL-Fu5OO4vL-LfqC-Ri-KNKmUcKUyM1F2E" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;
				</div>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-success">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
				  JQuery Ajax
				</a>
			  </h4>
			</div>
			<div id="collapseSix" class="panel-collapse collapse">
			  <div class="panel-body">
				<div class="well well-small">
					<strong>Loading another PHP file within HTML div tag:</strong><br>
					$(document).ready(function(){ $("#content").load("PATH TO THE PHP FILE");});
					<br><br>
					<a href="code for API/ajax jquery.txt">Link to TXT</a>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-royal">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
				  Twitter Bootstrap 3.0
				</a>
			  </h4>
			</div>
			<div id="collapseSeven" class="panel-collapse collapse">
			  <div class="panel-body">
				<div class="well well-small">
					<strong>Link to their documentation for all the HTML/CSS/JS/etc. calls:</strong><br>
					<a href="http://getbootstrap.com">Link to Bootstrap Site</a>
				</div>
			  </div>
			</div>
		  </div>
		</div>


	<!--push div to push the footer down-->
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
</html>