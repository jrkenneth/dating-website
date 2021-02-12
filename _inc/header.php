<?php
//ob_start();
session_start();
//error_reporting(0);
require_once('../_include/dbconnect.php');

		if(!isset($_SESSION['mem_id']))
		{
			//header("Location: login.php");
			$log_links = "
				<li class='header-login-button'>
								<a href='#' data-reveal-id='login_panel' class='tiny secondary button radius'>
									<i class='icon-user hide-for-medium-down'></i>
									LOG IN								</a>
							</li>

								<li class='header-register-button'>
									<a href='#' data-reveal-id='register_panel' class='tiny button radius'>
										<i class='icon-group hide-for-medium-down'></i>
										SIGN UP									</a>
								</li>
			";
			
			$joinUs = "
				<a href='#' data-reveal-id='register_panel'>
						<button class='button radius front-form-button'><i class='icon-group'></i>
						&nbsp;JOIN US NOW!</button>
					</a>
			";
			
			$newsletter_sec = "
							<form id='newsletter-form' method='post' class='row newsletter-form'>
			<div class='four columns'>
			  <div class='row collapse'>
				<div class='two mobile-one columns'>
						<span class='prefix'><i class='icon-user'></i></span>
				</div>
				<div class='ten mobile-three columns'>
						<input type='text' class='mc_yname' name='yname' id='yname' placeholder='Your name' required>
				</div>
			  </div>
			</div>
			<div class='five columns'>
			  <div class='row collapse'>
				<div class='two mobile-one columns'>
						<span class='prefix'><i class='icon-envelope'></i></span>
				</div>
				<div class='ten mobile-three columns'>
						<input type='email' name='mc_email' class='mc_email' id='mc_email' placeholder='Your email' required>
				</div>
			  </div>
			</div>
			<div class='three columns'>
				<p><button type='submit' id='newsletter-submit' name='subNewsl' class='small radius button expand'>JOIN US</button></p>
			</div>
			<div class='twelve column'>

			  <div><small id='result' class='mc_result'></small></div><strong>
			  <br>
<small><i class='icon-lock'></i> Your <a href='#'>privacy</a> is important to us and we will never rent or sell your information.</small></strong></div>
		  </form>
						";
			
		}else{
			$mem_id=$_SESSION['mem_id'];
			
			$sql = "SELECT * FROM members where id='$mem_id'";
			$run = mysqli_query($con, $sql);
			while($row = mysqli_fetch_array($run)){
				$memb_id=$row['id'];
				$f_name=$row['f_name'];
				$m_name=$row['m_name'];
				$l_name=$row['l_name'];
				$eml=$row['email'];
				$usn=$row['username'];
				$psw=$row['password'];
				$dj=$row['date_joined'];
				$gender=$row['gender'];
				$l_for=$row['looking_for'];
				$bday=$row['b_day'];
				$m_stat=$row['m_status'];
				$city=$row['city'];
				$country=$row['country'];
				$nat=$row['nationality'];
				$religion=$row['religion'];
				$l_seen=$row['last-seen'];
				$pic=$row['picture'];
				$user_stat=$row['status'];
			}
			
			if(isset($_GET['add_id'])){
				$newFriend = $_GET['add_id'];
				
				$sql_addf="INSERT INTO friends(m_id, friend_id)values('$mem_id', '$newFriend')";
				$result_addf=mysqli_query($con,$sql_addf);
				
				$sqlfrnd = "SELECT * FROM members where id='$newFriend'";
				$runfrnd = mysqli_query($con, $sqlfrnd);
				while($row = mysqli_fetch_array($runfrnd)){
					$memb_idfrnd=$row['id'];
					$f_namefrnd=$row['f_name'];
					$m_namefrnd=$row['m_name'];
					$l_namefrnd=$row['l_name'];
				}
						$friendlink = "<a href='index.php?uid=$newFriend'>$f_namefrnd $m_namefrnd $l_namefrnd</a>";			
						$friendl = mysqli_real_escape_string($con, $friendlink);
						
						$mylink = "<a href='index.php?uid=$mem_id'>$f_name $m_name $l_name</a>";			
						$myl = mysqli_real_escape_string($con, $mylink);
										
						$qryutl = "insert into user_timeline (user_id, activity) values ('$mem_id', '<b>$f_name</b> added a new friend <u><b>$friendl</b></u>')";						
						$runutl = mysqli_query($con, $qryutl);
										
						$qryutl2 = "insert into user_timeline (user_id, activity) values ('$newFriend', '<u><b>$myl</b></u> added you as friend!')";						
						$runutl2 = mysqli_query($con, $qryutl2);
												
							if ($result_addf && $runutl && $runutl2) {			
								
								echo "<script>alert('You added 1 new Friend!');</script>";
								
								//echo "<script>document.ready(window.setTimeout(location.href = 'http://localhost:140/dating/index.php',6000));</script>')";
								
								echo "<script>document.ready(window.setTimeout(location.href = 'javascript:history.go(-1)',1000));</script>";
							}
			}
			
			if(isset($_GET['remove'])){
				$unFriend = $_GET['remove'];
				
				$sql_unf="delete from friends where m_id='$mem_id' and friend_id='$unFriend'";
							
							$result_unf=mysqli_query($con,$sql_unf);
												
							if ($result_unf) {			
								
								echo "<script>alert('You removed 1 Friend!');</script>";
								
								//echo "<script>document.ready(window.setTimeout(location.href = 'http://localhost:140/dating/index.php',6000));</script>')";
								
								echo "<script>document.ready(window.setTimeout(location.href = 'javascript:history.go(-1)',1000));</script>";
							}
			}
			
			$sqlnewsl="SELECT * FROM email_subs WHERE email='$eml'";
					$resnewsl=mysqli_query($con,$sqlnewsl);
					$countnewsl = mysqli_num_rows($resnewsl);						
					if($countnewsl > 0) 
					{
						$newsletter_sec = "";
					}else{
						$newsletter_sec = "
							<form id='newsletter-form' method='post' class='row newsletter-form'>
			<div class='four columns'>
			  <div class='row collapse'>
				<div class='two mobile-one columns'>
						<span class='prefix'><i class='icon-user'></i></span>
				</div>
				<div class='ten mobile-three columns'>
						<input type='text' class='mc_yname' value='$f_name $l_name' name='yname' id='yname' placeholder='Your name' required>
				</div>
			  </div>
			</div>
			<div class='five columns'>
			  <div class='row collapse'>
				<div class='two mobile-one columns'>
						<span class='prefix'><i class='icon-envelope'></i></span>
				</div>
				<div class='ten mobile-three columns'>
						<input type='email' name='mc_email' value='$eml' class='mc_email' id='mc_email' placeholder='Your email' required>
				</div>
			  </div>
			</div>
			<div class='three columns'>
				<p><button type='submit' id='newsletter-submit' name='subNewsl' class='small radius button expand'>JOIN US</button></p>
			</div>
			<div class='twelve column'>

			  <div><small id='result' class='mc_result'></small></div><strong>
			  <br>
<small><i class='icon-lock'></i> Your <a href='#'>privacy</a> is important to us and we will never rent or sell your information.</small></strong></div>
		  </form>
						";
					}
			
			$log_links = "
				<li class='header-login-button'>
								<a href='http://localhost:140/dating/account/profile/index.php' class='tiny secondary button radius'>
									<i class='icon-user hide-for-medium-down'></i>
									MY PROFILE						</a>
							</li>

								<li class='header-register-button'>
									<a href='http://localhost:140/dating/index.php?logout=1' class='tiny button radius'>
										<i class='icon-lock hide-for-medium-down'></i>
										LOGOUT									</a>
								</li>
			";
			
			$joinUs = "";
		}
		
		
		
if( isset($_POST['log']) ) 
		{
			$uname=$_POST['user'];
			$pass=$_POST['pwd'];									
			$sql="SELECT * FROM members WHERE username='$uname' and password='$pass' and status='1'";
			$res=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
					
			if($count == 1) 
			{
			$id = $row['id'];
			$_SESSION['mem_id'] = $id;

			echo "<script>document.ready(window.setTimeout(location.href = '".$_SERVER['HTTP_REFERER']."',6000));</script>')";
			setcookie($must,"",time()-3600);

			}else {
				echo "<script>alert('Incorrect Credentials, Try again...');</script>";	
			}				
		}
	
?>


<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from seventhqueen.com/demo/sweetdatewp-modern/about-us/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 07:21:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width"/>

	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="pingback" href="../xmlrpc.php"/>

	<!--[if IE 7]>
	<link rel="stylesheet" href="https://seventhqueen.com/demo/sweetdatewp-modern/wp-content/themes/sweetdate/assets/styles/font-awesome-ie7.min.css">
	<script src="https://seventhqueen.com/demo/sweetdatewp-modern/wp-content/themes/sweetdate/assets/scripts/ie6/warning.js"></script>
	<![endif]-->

	<!--Favicons-->
			<link rel="shortcut icon" href="../wp-content/uploads/2013/06/favicon.png">
				<link rel="apple-touch-icon" href="../wp-content/uploads/2013/06/apple-touch-icon-57x57.png">
				<link rel="apple-touch-icon" sizes="57x57" href="../wp-content/uploads/2013/06/apple-touch-icon-57x57.png">
				<link rel="apple-touch-icon" sizes="72x72" href="../wp-content/uploads/2013/06/apple-touch-icon-72x72.png">
				<link rel="apple-touch-icon" sizes="114x114" href="../wp-content/uploads/2013/06/apple-touch-icon-114x114.png">
				<link rel="apple-touch-icon" sizes="144x144" href="../wp-content/uploads/2013/06/apple-touch-icon-144x144.png">
		
	
	<link rel="alternate" type="application/rss+xml" title="Sweet Date | Site Wide Activity RSS Feed" href="../activity/feed/index.html" />

	
	<title>BEMYSPOUSE</title>
<link rel='dns-prefetch' href='http://platform.twitter.com/' />
<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
<link rel='dns-prefetch' href='http://s.w.org/' />
<link rel="alternate" type="application/rss+xml" title="Sweet Date &raquo; Feed" href="../feed/index.html" />
<link rel="alternate" type="application/rss+xml" title="Sweet Date &raquo; Comments Feed" href="../comments/feed/index.html" />
    <link rel="manifest" href="https://seventhqueen.com/manifest.json">
    <script src="../../../../cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
    <script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
      appId: "d6a8d6b5-c948-4427-ac29-f9b1fe29e9a2",
      autoRegister: true,
      notifyButton: {
        enable: false /* Set to false to hide */
      },
      safari_web_id: 'web.onesignal.auto.4dbe0dd2-36c1-4474-980b-740086f7dd0e'
    }]);
    </script>
    		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-includes\/js\/wp-emoji-release.min.js"}};
			!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
	<link rel='stylesheet' id='wp-block-library-css'  href='../wp-includes/css/dist/block-library/style.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='wc-block-style-css'  href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='bbp-default-css'  href='../wp-content/themes/sweetdate/bbpress/css/bbpress.css' type='text/css' media='screen' />
<link rel='stylesheet' id='bp-parent-css-css'  href='../wp-content/themes/sweetdate/buddypress/css/buddypress.css' type='text/css' media='screen' />
<link rel='stylesheet' id='contact-form-7-css'  href='../wp-content/plugins/contact-form-7/includes/css/styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='pmpro_frontend-css'  href='../wp-content/themes/sweetdate/paid-memberships-pro/frontend.css' type='text/css' media='screen' />
<link rel='stylesheet' id='pmpro_print-css'  href='../wp-content/plugins/paid-memberships-pro/css/print.css' type='text/css' media='print' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='../wp-content/plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
<style id='rs-plugin-settings-inline-css' type='text/css'>
#rs-demo-id {}
</style>
<link rel='stylesheet' id='woocommerce-general-css'  href='../wp-content/themes/sweetdate/woocommerce/assets/css/woocommerce.css' type='text/css' media='all' />
<style id='woocommerce-inline-inline-css' type='text/css'>
.woocommerce form .form-row .required { visibility: visible; }
</style>
<link rel='stylesheet' id='lato700-css'  href='http://fonts.googleapis.com/css?family=Lato%3A700&amp;ver=5.2.3' type='text/css' media='all' />
<link rel='stylesheet' id='latoregular-css'  href='http://fonts.googleapis.com/css?family=Lato%3Aregular&amp;ver=5.2.3' type='text/css' media='all' />
<link rel='stylesheet' id='open-sansregular-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3Aregular&amp;ver=5.2.3' type='text/css' media='all' />
<link rel='stylesheet' id='foundation-css'  href='../wp-content/themes/sweetdate/assets/styles/foundation-nonresponsive.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='sq-font-awesome-css'  href='../wp-content/themes/sweetdate/assets/styles/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='prettyPhoto-css'  href='../wp-content/themes/sweetdate/assets/styles/prettyPhoto.css' type='text/css' media='all' />
<link rel='stylesheet' id='app-css'  href='../wp-content/themes/sweetdate/assets/styles/app.css' type='text/css' media='all' />
<link rel='stylesheet' id='foundation-responsive-css'  href='../wp-content/themes/sweetdate/assets/styles/responsive.css' type='text/css' media='all' />
<link rel='stylesheet' id='sweet-style-css'  href='../wp-content/themes/sweetdate-child/style.css' type='text/css' media='all' />
<script type='text/javascript' src='../wp-includes/js/jquery/jquery.js'></script>
<script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/buddypress/bp-core/js/vendor/jquery-cookie.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/bp-profile-search/bps-directory.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var BP_Confirm = {"are_you_sure":"Are you sure?"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/buddypress/bp-core/js/confirm.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/buddypress/bp-core/js/widget-members.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/buddypress/bp-core/js/jquery-query.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/buddypress/bp-core/js/vendor/jquery-scroll-to.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var BP_DTheme = {"accepted":"Accepted","close":"Close","comments":"comments","leave_group_confirm":"Are you sure you want to leave this group?","mark_as_fav":"Favorite","my_favs":"My Favorites","rejected":"Rejected","remove_fav":"Remove Favorite","show_all":"Show all","show_all_comments":"Show all comments for this thread","show_x_comments":"Show all comments (%d)","unsaved_changes":"Your profile has unsaved changes. If you leave the page, the changes will be lost.","view":"View","store_filter_settings":""};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/buddypress/bp-templates/bp-legacy/js/buddypress.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/buddypress/bp-groups/js/widget-groups.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var samAjax = {"ajaxurl":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-content\/plugins\/simple-ads-manager\/sam-ajax.php","loadurl":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-content\/plugins\/simple-ads-manager\/sam-ajax-loader.php","load":"","mailer":"1","clauses":"YTo0OntzOjI6IldDIjtzOjI5MjoiKElGKHNhLmFkX3VzZXJzID0gMCwgVFJVRSwgKHNhLmFkX3VzZXJzX3VucmVnID0gMSkpKSBBTkQgKChzYS52aWV3X3R5cGUgPSAxKSBPUiAoc2Eudmlld190eXBlID0gMCBBTkQgKHNhLnZpZXdfcGFnZXMrMCAmIDEwKSkgT1IgKHNhLnZpZXdfdHlwZSA9IDIgQU5EIEZJTkRfSU5fU0VUKDY1OCwgc2Eudmlld19pZCkpKSBBTkQgKHNhLmFkX2NhdHMgPSAwKSAgQU5EIChzYS5hZF9hdXRob3JzID0gMCkgICAgQU5EIElGKHNhLnhfaWQsIE5PVCBGSU5EX0lOX1NFVCg2NTgsIHNhLnhfdmlld19pZCksIFRSVUUpICAgICI7czozOiJXQ1QiO3M6MzY4OiIgQU5EIElGKHNhLmFkX3NjaGVkdWxlLCBDVVJEQVRFKCkgQkVUV0VFTiBzYS5hZF9zdGFydF9kYXRlIEFORCBzYS5hZF9lbmRfZGF0ZSwgVFJVRSkgQU5EIElGKHNhLmxpbWl0X2hpdHMsIHNhLmhpdHNfbGltaXQgPiAoU0VMRUNUIElGTlVMTChDT1VOVCgqKSwgMCkgRlJPTSBzd2VldF9zYW1fc3RhdHMgc3MgV0hFUkUgc3MuaWQgPSBzYS5pZCBBTkQgc3MuZXZlbnRfdHlwZSA9IDApLCBUUlVFKSBBTkQgSUYoc2EubGltaXRfY2xpY2tzLCBzYS5jbGlja3NfbGltaXQgPiAoU0VMRUNUIElGTlVMTChDT1VOVCgqKSwgMCkgRlJPTSBzd2VldF9zYW1fc3RhdHMgc3MgV0hFUkUgc3MuaWQgPSBzYS5pZCBBTkQgc3MuZXZlbnRfdHlwZSA9IDEpLCBUUlVFKSI7czozOiJXQ1ciO3M6ODA6IiBBTkQgSUYoc2EuYWRfd2VpZ2h0ID4gMCwgKHNhLmFkX3dlaWdodF9oaXRzKjEwLyhzYS5hZF93ZWlnaHQqMTAwMCkpIDwgMSwgRkFMU0UpIjtzOjQ6IldDMlciO3M6MjI6IkFORCAoc2EuYWRfd2VpZ2h0ID4gMCkiO30=","doStats":"1","container":"sam-container","place":"sam-place","ad":"sam-ad"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/simple-ads-manager/js/sam-layout.min.js'></script>
<script type='text/javascript' src='../wp-content/themes/sweetdate/assets/scripts/modernizr.foundation.js'></script>
<link rel='https://api.w.org/' href='../wp-json/index.html' />
<link rel="canonical" href="index.html" />
<link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embed90a0.json?url=https%3A%2F%2Fseventhqueen.com%2Fdemo%2Fsweetdatewp-modern%2Fabout-us%2F" />
<link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embed89af?url=https%3A%2F%2Fseventhqueen.com%2Fdemo%2Fsweetdatewp-modern%2Fabout-us%2F&amp;format=xml" />

	<script type="text/javascript">var ajaxurl = '../wp-admin/admin-ajax.html';</script>

<style>
.header-bg {background-color:#000000; background-image: url("../wp-content/uploads/2013/06/blurred_bg_01.jpg"); background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#header, #header .form-header .lead, #header label {color:#ffffff;} #header a:not(.button), div#main .widgets-container.sidebar_location .form-search a:not(.button), .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {color:#ffffff;} #header a:not(.button):hover,#header a:not(.button):focus{color:#ffffff;}.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #743349;}#header .top-bar ul > li:hover:not(.name) a {color:#ffffff}; .top-bar ul > li:not(.name):hover a, .top-bar ul > li:not(.name).active a, .top-bar ul > li:not(.name):focus a { color: #ffffff; }.top-bar ul > li.has-dropdown .dropdown:before { border-color: transparent transparent #743349 transparent; }.top-bar ul > li.has-dropdown .dropdown li a {color: #ffffff;background: #743349;}.top-bar ul > li.has-dropdown .dropdown li a:hover,.top-bar ul > li.has-dropdown .dropdown li a:focus { background: #92425d;}.top-bar ul > li.has-dropdown .dropdown li.has-dropdown .dropdown:before {border-color: transparent #743349 transparent transparent;}.lt-ie9 .top-bar section > ul > li a:hover, .lt-ie9 .top-bar section > ul > li a:focus { color: #ffffff; }.lt-ie9 .top-bar section > ul > li:hover, .lt-ie9 .top-bar section > ul > li:focus { background: #743349; }.lt-ie9 .top-bar section > ul > li.active { background: #743349; color: #ffffff; }#breadcrumbs-wrapp {background:#743349; }#breadcrumbs-wrapp, ul.breadcrumbs li:before {color:#f0f0f0;} #breadcrumbs-wrapp a{color:#ffffff;} #breadcrumbs-wrapp a:hover,#breadcrumbs-wrapp a:focus{color:#92425d;}.kleo-page {background:#ffffff; }div#main {color:#777777;}a:not(.button),div#main a:not(.button):not(.elementor-button), #header .form-footer a:not(.button){color:#333333;} div#main a:not(.button):not(.elementor-button):hover, a:not(.button):not(.elementor-button):hover,a:not(.button):focus,div#main a:not(.button):focus{color:#92425d;}div#main .widgets-container.sidebar_location {color:#777777;} div#main .widgets-container.sidebar_location a:not(.button){color:#666666;} div#main .widgets-container.sidebar_location a:not(.button):hover,div#main a:not(.button):focus{color:#92425d;}#footer {background:#171717 url("../wp-content/themes/sweetdate/assets/images/patterns/black_pattern.gif"); }#footer, #footer .footer-social-icons a:not(.button), #footer h5{color:#777777;} #footer a:not(.button){color:#743349;} #footer a:not(.button):hover,#footer a:not(.button):focus{color:#92425d;}h1 {font: normal 46px 'Lato'; color: #222222;}h2 {font: normal 30px 'Lato'; color: #222222;}h3 {font: normal 26px 'Lato'; color: #222222;}h4 {font: normal 20px 'Open Sans'; color: #222222;}h5 {font: normal 17px 'Open Sans'; color: #222222;}h6 {font: normal 14px 'Open Sans'; color: #222222;}body, p, div {font: normal 13px 'Open Sans';}.form-search, .form-header, div.alert-box, div.pagination span.current {background:#743349}.top-links, .top-links a, .circular-progress-item input, .ajax_search_image .icon{color: #743349;}.form-search .notch {border-top: 10px solid #743349;}.form-search.custom div.custom.dropdown a.current, .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {background-color: #92425d; }.form-search.custom div.custom.dropdown a.selector, .form-search.custom div.custom.dropdown a.current, .form-search.custom select { border: solid 1px #92425d; }.form-search.custom input[type="text"]::placeholder, .form-search.custom input[type="password"]::placeholder {color: #ffffff;}.form-search.custom input[type="text"],.form-search.custom input[type="password"] {border: 1px solid #743349 }.form-header, div.alert-box {color:#ffffff}.mejs-controls .mejs-time-rail .mejs-time-loaded{background-color: #92425d; }.form-search {border-left: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.form-header {border-left: 10px solid rgba(146, 66, 93, 0.3); border-top: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.tabs.pill.custom dd.active a, .tabs.pill.custom li.active a, div.item-list-tabs ul li a span, #profile .pmpro_label {background: #743349; color: #ffffff;}.tabs.pill.custom dd.active a:after {border-top: 10px solid #743349}.tabs.info dd.active a, .tabs.info li.active a, #object-nav ul li.current a, #object-nav ul li.selected a, .tabs.info dd.active, .tabs.info li.active, #object-nav ul li.selected, #object-nav ul li.current {border-bottom: 2px solid #743349;} .tabs.info dd.active a:after, #object-nav ul li.current a:after, #object-nav ul li.selected a:after {border-top:5px solid #743349;}div.item-list-tabs li#members-all.selected, div.item-list-tabs li#members-personal.selected, .section-members .item-options .selected {border-bottom: 3px solid #743349;} div.item-list-tabs li#members-all.selected:after, div.item-list-tabs li#members-personal.selected:after, .section-members .item-options .selected:after {border-top: 5px solid #743349}.button, ul.sub-nav li.current a, .item-list-tabs ul.sub-nav li.selected a, #subnav ul li.current a, .wpcf7-submit, #rtmedia-add-media-button-post-update, #rt_media_comment_submit, .rtmedia-container input[type="submit"] { border: 1px solid #743349; background: #743349; color: #ffffff; }.button:hover, .button:focus, .form-search .button, .form-search .button:hover, .form-search .button:focus, .wpcf7-submit:focus, .wpcf7-submit:hover, #rtmedia-add-media-button-post-update:hover, #rt_media_comment_submit:hover, .rtmedia-container input[type="submit"]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.button.secondary,.button.dropdown.split.secondary > a, #messages_search_submit, #rtmedia-whts-new-upload-button, #rtMedia-upload-button, #rtmedia_create_new_album,#rtmedia-nav-item-albums-li a,#rtmedia-nav-item-photo-profile-1-li a,#rtmedia-nav-item-video-profile-1-li a,#rtmedia-nav-item-music-profile-1-li a,.bp-member-dir-buttons div.generic-button a.add,.bp-member-dir-buttons div.generic-button a.remove { background-color: #E6E6E6; color: #1D1D1D; border: 1px solid #E6E6E6; }.button.secondary:hover, .button.secondary:focus, .button.dropdown.split.secondary > a:hover, .button.dropdown.split.secondary > a:focus, #messages_search_submit:hover, #messages_search_submit:focus,  #rtmedia-whts-new-upload-button:hover, #rtMedia-upload-button:hover, #rtmedia_create_new_album:hover,#rtmedia-nav-item-albums-li a:hover,#rtmedia-nav-item-photo-profile-1-li a:hover,#rtmedia-nav-item-video-profile-1-li a:hover,#rtmedia-nav-item-music-profile-1-li a:hover,.bp-member-dir-buttons div.generic-button a.add:hover,.bp-member-dir-buttons div.generic-button a.remove:hover { background-color: #DDDCDC;  border: 1px solid #DDDCDC; color: #1D1D1D; }.btn-profile .button.dropdown > ul, .button.dropdown.split.secondary > span {background: #E6E6E6;}.button.dropdown.split.secondary > span:hover, .button.dropdown.split.secondary > span:focus { background-color: #DDDCDC; color: #1D1D1D;}#header .btn-profile a:not(.button) {color: #1D1D1D;}#header .btn-profile .button.dropdown > ul li:hover a:not(.button),#header .btn-profile .button.dropdown > ul li:focus a:not(.button) {background-color: #DDDCDC; color:#1D1D1D;}.button.bordered { background-color: #fff; border: 1px solid #E6E6E6; color: #1D1D1D; }.button.bordered:hover,.button.bordered:focus { background-color: #DDDCDC; border: 1px solid #DDDCDC; color: #1D1D1D; }div#profile {background-color:#FAFAFA; background-image: url("../../sweetdatewp/wp-content/uploads/2013/06/blurred_bg_01.jpg"); background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#profile, #profile h2, #profile span {color:#ffffff;} #profile .cite a, #profile .regulartab a, #profile .btn-carousel a {color:#ffffff;} #profile .cite a:hover,#profile .cite a:focus, #profile .regulartab a:hover, #profile .regulartab a:focus, .callout .bp-profile-details:before{color:#743349;}#profile .tabs.pill.custom dd.active a, #profile .pmpro_label {background: #743349 }#profile:after {border-color:#FAFAFA transparent transparent transparent;}#item-header-avatar img, .mySlider img {border-color: rgba(255,255,255,0.1) !important;}#profile .generic-button a, .tabs.pill.custom dd:not(.active) a, #profile .callout, .regulartab dt, .regulartab dd {background: rgba(255,255,255,0.1); color: #ffffff;}#profile hr {border-color: rgba(255,255,255,0.1);}.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button, .rtmedia-item-actions input[type=submit] {border: 1px solid #743349; background: #743349; color: #ffffff; }.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button:hover, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button:hover, .rtmedia-item-actions input[type=submit]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce span.onsale, .woocommerce-page span.onsale{background:#743349;} .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {border: 1px solid #743349;background:#92425d}.woocommerce .widget_layered_nav_filters ul li a, .woocommerce-page .widget_layered_nav_filters ul li a { border: 1px solid #743349; background-color: #743349; color: #ffffff; }.woocommerce div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active:after {border-top:5px solid #743349}.woocommerce #main ul.products li a.view_details_button:not(.button),.woocommerce ul.products li .add_to_cart_button:before,.woocommerce ul.products li .product_type_grouped:before,.woocommerce ul.products li .add_to_cart_button.added:before,.woocommerce ul.products li .add_to_cart_button.loading:before,.woocommerce ul.products li .product_type_external:before,.woocommerce ul.products li .product_type_variable:before, .woocommerce ul.products li .add_to_cart_button.loading,.woocommerce ul.products li .add_to_cart_button,.woocommerce ul.products li .product_type_grouped,.woocommerce ul.products li .view_details_button,.woocommerce ul.products li .product_type_external,.woocommerce ul.products li .product_type_variable{color:#743349}.woocommerce ul.products li .add_to_cart_button:hover:before, .woocommerce ul.products li .product_type_grouped:hover:before, .woocommerce ul.products li .view_details_button:hover:before, .woocommerce ul.products li .product_type_external:hover:before, .woocommerce ul.products li .product_type_variable:hover:before {color: #ffffff;}.woocommerce ul.products li .add_to_cart_button:hover, .woocommerce ul.products li .product_type_grouped:hover, .woocommerce ul.products li .view_details_button:hover, .woocommerce ul.products li .product_type_external:hover, .woocommerce ul.products li .product_type_variable:hover{color: #ffffff;background-color: #92425d}@media only screen and (max-width: 940px) {.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #92425d; }.top-bar { background: #743349; }.top-bar > ul .name h1 a { background: #92425d; }.top-bar ul > li.has-dropdown.moved > .dropdown li a:hover { background: #92425d; display: block; }.top-bar ul > li.has-dropdown .dropdown li.has-dropdown > a li a:hover, .top-bar ul > li.toggle-topbar { background: #92425d; }}@media screen and (max-width: 600px) {#wpadminbar { position: fixed; }}@media screen and ( max-width: 782px ) {.adminbar-enable .sticky.fixed { margin-top: 46px; }}.top-links { border-bottom: none; }
#profile:after { border: none; }


</style>
	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
	<meta name="generator" content="Powered by Slider Revolution 5.3.1.5 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
</head>

<body class="bp-legacy page-template page-template-page-templates page-template-full-width page-template-page-templatesfull-width-php page page-id-658 theme-sweetdate pmpro-body-has-access woocommerce-no-js elementor-default no-js">



  <div id="fb-root"></div>
	<script>
		// Additional JS functions here
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '132565730272019', // App ID
				version    : 'v2.6',
				status     : true, // check login status
				cookie     : true, // enable cookies to allow the server to access the session
				xfbml      : true,  // parse XFBML
				oauth      : true
			});

			// Additional init code here
            jQuery('body').trigger('sq_fb.init');

		};

        // Load the SDK asynchronously
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "../../../../connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
	</script>
    
<!-- Page
================================================ -->
<!--Attributes-->
<!--class = kleo-page wide-style / boxed-style-->
<div class="kleo-page wide-style">

	
<!-- HEADER SECTION ================================================ -->
<header>
	<div class="header-bg clearfix">

					<!--Top links-->
			<div class="top-links">
				<div class="row">
					<ul class="no-bullet">
						<li class="nine columns">
							
							
															<a class="mail-top" href="mailto:wecare@BEMYSPOUSE.com">
									<i class="icon-envelope"></i>
									&nbsp; wecare@BEMYSPOUSE.com								</a>
							</li>
						<li class="three columns hide-for-small">
															Find us on: &nbsp;
									<a href="" class="has-tip tip-bottom" data-width="210" target="_blank" title="Follow us on Twitter">
										<i class="icon-twitter icon-large"></i>
									</a>
									<a href="" class="has-tip tip-bottom" data-width="210" target="_blank" title="Find us on Facebook">
										<i class="icon-facebook icon-large"></i>
									</a>
																																						<a href="" class="has-tip tip-bottom" data-width="210" target="_blank" title="Pin us on Pinterest">
										<i class="icon-pinterest icon-large"></i>
									</a>
																
																					</li>
					</ul>
				</div>
			</div>
			<!--end top-links-->
		
		<div id="header">
			<div class="row">

				<!-- Logo -->
				<div class="four columns">
					<div id="logo">Sweet Date						<a href="../index.php">
							<img id="logo_img"
							     src="../wp-content/themes/sweetdate/assets/images/logo.png"
							     width="294" height="108" alt="Sweet Date">
						</a>
					</div>
				</div>
				<!--end logo-->

				<!-- Login/Register/Forgot username/password Modal forms
					-  Hidden by default to be opened through modal-->

				<!--Login buttons-->
				<div class="eight columns login-buttons">
					<ul class="button-group radius right">
						
						<?php echo $log_links; ?>
							
											</ul>
				</div>
				<!--end login buttons-->


				<!-- Main Navigation -->
				<div class="eight columns">
					<div class="contain-to-grid sticky">
						<nav class="top-bar">
							<a href="../index.php" class="small-logo"><img
									src="../wp-content/themes/sweetdate/assets/images/small_logo.png"
									height="43" alt="Sweet Date"></a>
							<ul>
								<!-- Toggle Button Mobile -->
								<li class="name">
									<h1><a href="#">Navigation</a>
									</h1>
								</li>
								<li class="toggle-topbar"><a href="#"><i class="icon-reorder"></i></a></li>
								<!-- End Toggle Button Mobile -->
							</ul>

							<section><!-- Nav Section -->
								<ul id="menu-sweetdate" class="right"><li id="nav-menu-item-918" ><a href="../index.php" class="menu-item menu-item-type-post_type menu-item-object-page main-menu-link">Welcome</a></li>
								
<li id="nav-menu-item-989" ><a href="../about-us/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">About us</a></li>

<?php
	if(!isset($_SESSION['mem_id']))
	{
	}else{
?>

<li id="nav-menu-item-989" ><a href="../members/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">Members</a></li>
<li id="nav-menu-item-989" ><a href="../forum/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">Group Forums</a></li>

<?php
	}
?>

<li id="nav-menu-item-989" ><a href="../contact/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">Contact</a></li>

</ul>							</section><!-- End Nav Section -->
						</nav>
					</div><!--end contain-to-grid sticky-->
				</div>
				<!-- end Main Navigation -->
			</div><!--end row-->

			
		<div class="row just-after-header">
					</div>

		
	</div><!--end #header-->

	
		</div><!--end header-bg-->
</header>
<!--END HEADER SECTION-->