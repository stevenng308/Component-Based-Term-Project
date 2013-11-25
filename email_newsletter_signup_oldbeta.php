<!-- Paws For A Cause -->
<!-- Author: Jestin Keaton -->
<!-- email_newsletter_signup.php -->

<!DOCTYPE html>
<html dir="ltr">
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
echo $layout->loadNarrowNav('Newsletter', '');
?>

<!-- Custom styles for this template -->
<link href="bootstrap/dist/css/signin.css" rel="stylesheet">

<div class="container">
	<div id="wrap">
		<form form name="signin" class="form-signin" action="http://spsu.us3.list-manage.com/subscribe/post" method="POST">
		<h3 class="form-signin-heading" >Sign up today to receive our weekly newsletter explaining promotions and upcoming events!</h3>
			<input type="hidden" name="u" value="e5e48e8014302e574975e778b">
			<input type="hidden" name="id" value="0fedd6c0f2">

			<input type="email" class="form-control" name="MERGE0" id="MERGE0"  placeholder="Email address" autofocus>
			<input type="text" class="form-control" name="MERGE1" id="MERGE1" placeholder="First Name" value="">

			<input type="text" class="form-control" name="MERGE2" id="MERGE2" placeholder="Last Name" value="">

			<strong>Preferred format</strong>
				<div class="radio">
				  <label>
					<input type="radio" name="EMAILTYPE" id="EMAILTYPE_HTML" value="html" checked>
					HTML
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="EMAILTYPE" id="EMAILTYPE_TEXT" value="text">
					TEXT
				  </label>
				</div>
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Subscribe to list">
		</form>
		<div id="push"></div>
	</div>
</div>
<?php	  
echo $layout->loadFooter('');
?>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
    $(document).ready(function(){	
        try {
        $(':input:visible:first').focus();
		$('#archive-list li:even').addClass("odd");
        $('.field-group, .field-group input, .field-group select').bind('click',function(event){		 			
			if (event.type == 'click') {
	 			if ($(this).hasClass('field-group')){
	 			    var fg = $(this);
	 			    if($(this).children('.datefield').length == 1){
	 			        // Do not select 1st input so date picker will work.
	 			    } else {
	 			        $(this).find('input, select').slice(0,1).focus();
 			        }
	 			} else {
	 			    var fg = $(this).parents('.field-group');
				    $(this).focus();
	 			}
            	fg.not('.focused-field').addClass('focused-field').children('.field-help').slideDown('fast');
            	$('.focused-field').not(fg).removeClass('focused-field').children('.field-help').slideUp('fast');
			}
		    event.stopPropagation();
        });
        $('label').bind('click',function(event){
			if (event.type == 'click') {
                var fg = $(this).next();

 			    if(fg.children('.datefield').length == 1){
 			        // Do not select 1st input so date picker will work.
 			    } else {
 			        fg.find('input, select').slice(0,1).focus();
		        }
            	fg.not('.focused-field').addClass('focused-field').children('.field-help').slideDown('fast');
            	$('.focused-field').not(fg).removeClass('focused-field').children('.field-help').slideUp('fast');
			}
		    event.stopPropagation();
        });
        // Allow select inputs to be width:auto up to 500px (because max-width doesn't work in IE7)
        $("select").each(function(){
            $(this).css("width", "auto");
            if($(this).width() > 500){
                $(this).css("width", "500px");
            }
        });

        } catch(e){ console.log(e); }
    });		
</script>

<script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.mailcheck.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        try {
        var domains =['hp.com','hotmail.co.uk','yahoo.co.uk','yahoo.com.tw','yahoo.com.au','yahoo.com.mx','gmail.com','hotmail.com','yahoo.com','aol.com','comcast.net','msn.com','seznam.cz','sbcglobal.net','live.com','bellsouth.net','hotmail.fr','verizon.net','mail.ru','btinternet.com','cox.net','yahoo.com.br','bigpond.com','att.net','yahoo.fr','mac.com','ymail.com','googlemail.com','earthlink.net','xtra.co.nz','me.com','yahoo.gr','walla.com','yahoo.es','charter.net','shaw.ca','live.nl','yahoo.ca','orange.fr','optonline.net','gmx.de','wanadoo.fr','optusnet.com.au','rogers.com','web.de','ntlworld.com','juno.com','yahoo.com.sg','rocketmail.com','yandex.ru','yahoo.co.in','centrum.cz','live.co.uk','sympatico.ca','libero.it','walla.co.il','bigpond.net.au','yahoo.com.hk','ig.com.br','live.com.au','free.fr','sky.com','uol.com.br','abv.bg','live.fr','terra.com.br','hotmail.it','tiscali.co.uk','rediffmail.com','aim.com','blueyonder.co.uk','telus.net','bol.com.br','hotmail.es','email.cz','windowslive.com','talktalk.net','home.nl','t-online.de','yahoo.de','telenet.be','163.com','embarqmail.com','windstream.net','roadrunner.com','bluewin.ch','skynet.be','laposte.net','yahoo.it','qq.com','live.dk','planet.nl','hetnet.nl','gmx.net','mindspring.com','rambler.ru','iinet.net.au','eircom.net','yahoo.com.ar','wp.pl','mail.com','emmis.com','hotmail.de','lireo.com','gmx.at','ukr.net','zol.co.zw'];
        var tdomains = [];
        $('#MERGE0').on('blur', function() {
          $(this).mailcheck({
            domains: domains,
            topLevelDomains: tdomains,
            suggested: function(element, suggestion) {
                var msg = 'Hmm, did you mean '+suggestion.full+'?';
                if ( $('#MERGE0_mailcheck').length > 0 ){
                    $('#MERGE0_mailcheck').html(msg);
                } else {
                    element.after('<div id="MERGE0_mailcheck" class="errorText">'+msg+'</div>');
                }
            },
            empty: function(element) {
                if ( $('#MERGE0_mailcheck').length > 0 ){
                    $('#MERGE0_mailcheck').remove();
                }
              return;
            }
          });
        });
        } catch(e){ console.log(e); }
    });
</script>

<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var _gaq = _gaq || [];
		_gaq.push(["_setAccount", "UA-329148-88"]);
		_gaq.push(["_setDomainName", ".list-manage.com"]);
		_gaq.push(["_trackPageview"]);
		_gaq.push(["_setAllowLinker", true]);
	} catch(err) {console.log(err);}
</script>
</html>
            