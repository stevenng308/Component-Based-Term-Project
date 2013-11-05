$(function(){

	$('[data-toggle="popover"]').popover({
		trigger: 'click',
		'placement': 'bottom',
		'content': 
		'<a href="javascript:;" class="btn btn-sm btn-primary simpleCart_empty">Empty Cart</a>&nbsp;               <a href="javascript:;" class="btn btn-sm btn-success simpleCart_checkout">Checkout</a>',
		'html': 'true'
	});
	
});
