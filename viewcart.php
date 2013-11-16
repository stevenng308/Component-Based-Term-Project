<!-- Paws For A Cause -->
<!-- Author: Steven Ng -->
<!-- viewcart -->

<html>
<?php
//Auto loads all the class files in the classes folder
//Use require_once "dirname(dirname(__FILE__)) ." without quotes in front of '\AutoLoader.php' if you need to go up 2 directories to root. "dirname(__FILE__)) ." for 1 directory up.
require_once '\AutoLoader.php';
spl_autoload_register(array('AutoLoader', 'autoLoad'));

session_start();
$layout = new Layout();
$loggedIn = false;
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) 
{
	$loggedIn = true;
}
echo $layout->loadNarrowNav('View Cart', '');
?>

<div class="container">
	<div id="wrap"> <!-- wraps the main div in its own section so it stays where it needs to be-->
	<h2 class="">Shopping Cart</h2>
	<style>
		.simpleCart_items table{
			border:1px solid #ccc;
		}
		.simpleCart_items th{
			color:#333;
			text-align:left;
			padding:10px 20px;
			border-bottom:1px solid #ccc;
			background: #ededed;
			background: -moz-linear-gradient(top,  #f7f7f7 0%, #ededed 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#ededed));
			background: -webkit-linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
			background: -o-linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
			background: -ms-linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
			background: linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7f7', endColorstr='#ededed',GradientType=0 );
		}
		.simpleCart_items td{
			padding:10px 20px;
			vertical-align:middle;
			border-bottom:1px solid #ccc;
			
		}
		.item-image,
		.item-image img{width:72px;}
		.item-name{width:50%;}
		.item-quantity,
		.item-quantity input{
			width:30px;
			text-align:center;
		}
		.item-price,
		.item-subtotal{width:50px;}
	</style>
	<div class="simpleCart_items"></div>
	<div align="right">
		<a href="javascript:;" class="btn btn-lg btn-success simpleCart_checkout">Checkout</a>
	</div>
	
	<!--push div to push the footer down-->
	<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
<script>
	simpleCart({
		//Setting the Cart Columns for the sidebar cart display.
		cartColumns: [
			{ attr: "image", label: false, view: "image"},
			//Name of the item
			{ attr: "name" , label: "Name" },
			//Quantity displayed as an input
			{ attr: "quantity", label: "Quantity", view: "input"},
			//Built in view for a remove link
			{ view:'remove', text: "Remove", label: false},
			//Price of item
			{ attr: "price", label: "Price"},
			//Subtotal of that row (quantity of that item * the price)
			{ attr: "total" , label: "Subtotal", view: "currency"  }
		],
		cartStyle: "table"
	});
	
</script>
</html>