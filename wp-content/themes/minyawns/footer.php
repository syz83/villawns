<a href="#" class="scrollup">Scroll</a>

<script type="text/javascript">
var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>"
<?php if(isset($_REQUEST['action']))
{
	if($_REQUEST['action']=="invalid_login")
	{
	?>
	jQuery(document).ready(function($){
	jQuery("#btn__login").click();
	jQuery("#div_loginmsg").html("<div class='alert alert-error alert-box' style='padding: 10px 45px 10px 5px;font-size:12px'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>You havent registered with your facebook account/email on Minyawns. Please use Registration form to sign up on Minyawns. </div>");
	})
	<?php 
	}
}
		
?>


<?php

$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')=== FALSE ? 'http' : 'https';
$host     = $_SERVER['HTTP_HOST'];

$plain_host = str_replace('fresno.','',$host);
if(strpos($plain_host,'fresno.')!==false){
   $fresno_host = $plain_host;
   $seattle_host = str_replace("fresno.","",$plain_host);
}
else {

   if(strpos($plain_host,'www.')!==false){
       $seattle_host = $plain_host ;
       $plain_host = str_replace("www.","",$plain_host);
       $fresno_host = "www.fresno.".$plain_host ;


   }
   else{
       $seattle_host = $plain_host ;
       $fresno_host = "fresno.".$plain_host ;
   }

}

$script   = $_SERVER['SCRIPT_NAME'];
$params   = $_SERVER['QUERY_STRING'];

/* echo "<br/>protocol : ". $protocol;
echo "<br/>host : ". $host;
echo "<br/>script : ". $script;
echo "<br/>params : ". $params;*/

//echo "<br/>params : ". $params."++";
/*$seattle_url =   $protocol . '://' . $seattle_host . $script . '?' . ($params==""?"citychk=0&city=seattle":"&citychk=0&city=seattle");

$fresno_url =   $protocol . '://' . $fresno_host . $script . '?' . ($params==""?"citychk=0&city=fresno":"&citychk=0&city=fresno");
*/

$seattle_url =   $protocol . '://' . $seattle_host . $script . '?' . 'citychk=0&city=seattle';

$fresno_url =   $protocol . '://' . $fresno_host . $script . '?' . 'citychk=0&city=fresno';



/*  echo " <br/><br/> Seattle url : ".$seattle_url;
echo " <br/><br/> fresno url : ".$fresno_url;*/
echo "var fresno_url = '".$fresno_url."' ;  \n";
echo "var seattle_url = '".$seattle_url."' ; \n";

?>
</script>
<?php if(is_page('home')){ ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
 jQuery('.carousel').carousel({
	interval: 2000
		})
		
		  $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
		  });
</script>
<?php } ?>
<footer>
<span class="footer-top"></span>

<?php /*<div class="text-center chs-city">City :<a href="<?php echo $seattle_url; ?>"> Seattle</a>&nbsp; &nbsp;<a href="<?php echo $fresno_url; ?>">  Fresno</a></div>  */ ?>
	<ul class="footer_menu">
		<li><a href="<?php echo site_url(); ?>/about/">About</a></li>
		<li><a href="<?php echo site_url(); ?>/terms-of-service/">Terms</a></li>
		<li><a href="<?php echo site_url(); ?>/privacy/">Privacy</a></li>
		<li><a href="<?php echo site_url(); ?>/helpfaqs/">Help</a></li>
		<li><a href="<?php echo site_url(); ?>/careers/">Careers</a></li>
		<li><a href="<?php echo site_url(); ?>/contact/">Contact</a></li>
	</ul>
	<br>
	<b class="social-icon">
&nbsp;&nbsp;<a href="https://www.facebook.com/minyawn" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/images/social-fb.png" alt="" /></a>  &nbsp;<a href="https://twitter.com/Minyawns"  target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social-twitter.png" alt="" /> </a>

</b>

	
	<div class="site_link">All rights reserved 2013 @ Minyawns</div>
</footer>

</body>
</html>
