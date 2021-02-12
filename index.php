<?php
//ob_start();
session_start();
//error_reporting(0);
require_once('_include/dbconnect.php');

if(isset($_GET['logout']))
{
	session_destroy();
	echo "<script>document.ready(window.setTimeout(location.href = 'http://localhost:140/dating/index.php',6000));</script>')";
}

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
						&nbsp; GET STARTED !</button>
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
									<a href='".$_SERVER['HTTP_REFERER']."?logout=1' class='tiny button radius'>
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
		
		if(isset($_POST['registration_submit'])){
			if(isset($_POST['agree'])){	
				
				$fname = $_POST['fname'];
				$mname = $_POST['mname'];
				$lname = $_POST['lname'];
				$y_email = $_POST['y_email'];
				$uname = $_POST['uname'];
				$pw = $_POST['pword'];
				$c_pw = $_POST['c_pword'];
				$gender = $_POST['gender'];
				$l_for = $_POST['l_for'];
				$dob = $_POST['dob'];
				$m_stat = $_POST['m_status'];
				$city = $_POST['city'];
				$country = $_POST['country'];
				$nation = $_POST['nation'];
				$religion = $_POST['religion'];				
			
				$regdate = date("Y-m-d h:i:s");
				
				$sqlem="SELECT * FROM members WHERE email='$y_email'";
				$resem=mysqli_query($con,$sqlem);
				$countem = mysqli_num_rows($resem);						
				if($countem < 1) 
				{
					$sqlusers="SELECT * FROM members WHERE username='$uname'";
					$resusers=mysqli_query($con,$sqlusers);
					$countusers = mysqli_num_rows($resusers);						
					if($countusers < 1) 
					{
					
						$ifile=$_FILES['pro_pic']['name']; 
						$ifile_tmp1=$_FILES['pro_pic']['tmp_name'];
						move_uploaded_file($ifile_tmp1,"members/photos/$ifile");
						
						if($pw==$c_pw) {

						
							$sql="INSERT INTO members(f_name, m_name, l_name, email, username, password, date_joined, gender, looking_for, b_day, m_status, city, country, nationality, religion, picture)values('$fname', '$mname', '$lname', '$y_email', '$uname', '$c_pw', '$regdate', '$gender', '$l_for', '$dob', '$m_stat', '$city', '$country', '$nation', '$religion', '$ifile')";
							
							$result=mysqli_query($con,$sql);
												
							if ($result) {			
								
								echo "<script>alert('Registration Success! Continue to Login...');</script>";
								echo "<script>document.ready(window.setTimeout(location.href = 'http://localhost:140/dating/index.php',6000));</script>')";
							} else {
								echo "<script>alert('Something went wrong, try again later...');</script>";	
							}
						} 
					}else{
						echo "<script>alert('Sorry, this Username is in use already!');</script>";
					}
				}else{
					echo "<script>alert('Sorry, this email exists already!');</script>";
				}
			}else{
				echo "<script>alert('Error! Kindly agree to terms to register');</script>";
			}
			
		}
	
?>


<!DOCTYPE html>
<html class="no-js" lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width"/>

			<link rel="shortcut icon" href="wp-content/uploads/2013/06/favicon.png">
				<link rel="apple-touch-icon" href="wp-content/uploads/2013/06/apple-touch-icon-57x57.png">
				<link rel="apple-touch-icon" sizes="57x57" href="wp-content/uploads/2013/06/apple-touch-icon-57x57.png">
				<link rel="apple-touch-icon" sizes="72x72" href="wp-content/uploads/2013/06/apple-touch-icon-72x72.png">
				<link rel="apple-touch-icon" sizes="114x114" href="wp-content/uploads/2013/06/apple-touch-icon-114x114.png">
				<link rel="apple-touch-icon" sizes="144x144" href="wp-content/uploads/2013/06/apple-touch-icon-144x144.png">
		
	
	<title>BEMYSPOUSE</title>
<link rel='dns-prefetch' href='http://platform.twitter.com/' />
<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
<link rel='dns-prefetch' href='http://s.w.org/' />
    <script src="../../../cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
	

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
	<link rel='stylesheet' id='wp-block-library-css'  href='wp-includes/css/dist/block-library/style.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='wc-block-style-css'  href='wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='bbp-default-css'  href='wp-content/themes/sweetdate/bbpress/css/bbpress.css' type='text/css' media='screen' />
<link rel='stylesheet' id='bp-parent-css-css'  href='wp-content/themes/sweetdate/buddypress/css/buddypress.css' type='text/css' media='screen' />
<link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='pmpro_frontend-css'  href='wp-content/themes/sweetdate/paid-memberships-pro/frontend.css' type='text/css' media='screen' />
<link rel='stylesheet' id='pmpro_print-css'  href='wp-content/plugins/paid-memberships-pro/css/print.css' type='text/css' media='print' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='wp-content/plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
<style id='rs-plugin-settings-inline-css' type='text/css'>
#rs-demo-id {}
</style>
<link rel='stylesheet' id='woocommerce-general-css'  href='wp-content/themes/sweetdate/woocommerce/assets/css/woocommerce.css' type='text/css' media='all' />
<style id='woocommerce-inline-inline-css' type='text/css'>
.woocommerce form .form-row .required { visibility: visible; }
</style>
<link rel='stylesheet' id='lato700-css'  href='http://fonts.googleapis.com/css?family=Lato%3A700&amp;ver=5.2.3' type='text/css' media='all' />
<link rel='stylesheet' id='latoregular-css'  href='http://fonts.googleapis.com/css?family=Lato%3Aregular&amp;ver=5.2.3' type='text/css' media='all' />
<link rel='stylesheet' id='open-sansregular-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3Aregular&amp;ver=5.2.3' type='text/css' media='all' />
<link rel='stylesheet' id='foundation-css'  href='wp-content/themes/sweetdate/assets/styles/foundation-nonresponsive.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='sq-font-awesome-css'  href='wp-content/themes/sweetdate/assets/styles/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='prettyPhoto-css'  href='wp-content/themes/sweetdate/assets/styles/prettyPhoto.css' type='text/css' media='all' />
<link rel='stylesheet' id='app-css'  href='wp-content/themes/sweetdate/assets/styles/app.css' type='text/css' media='all' />
<link rel='stylesheet' id='foundation-responsive-css'  href='wp-content/themes/sweetdate/assets/styles/responsive.css' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-css'  href='wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-animations-css'  href='wp-content/plugins/elementor/assets/lib/animations/animations.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css'  href='wp-content/plugins/elementor/assets/css/frontend.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='wp-content/plugins/elementor/assets/lib/font-awesome/css/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-global-css'  href='wp-content/uploads/elementor/css/global.css' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-1788-css'  href='wp-content/uploads/elementor/css/post-1788.css' type='text/css' media='all' />
<link rel='stylesheet' id='sweet-style-css'  href='wp-content/themes/sweetdate-child/style.css' type='text/css' media='all' />
<script type='text/javascript' src='wp-includes/js/jquery/jquery.js'></script>
<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/buddypress/bp-core/js/vendor/jquery-cookie.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/bp-profile-search/bps-directory.js'></script>

<script type='text/javascript' src='wp-content/plugins/buddypress/bp-core/js/confirm.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/buddypress/bp-core/js/widget-members.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/buddypress/bp-core/js/jquery-query.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/buddypress/bp-core/js/vendor/jquery-scroll-to.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var BP_DTheme = {"accepted":"Accepted","close":"Close","comments":"comments","leave_group_confirm":"Are you sure you want to leave this group?","mark_as_fav":"Favorite","my_favs":"My Favorites","rejected":"Rejected","remove_fav":"Remove Favorite","show_all":"Show all","show_all_comments":"Show all comments for this thread","show_x_comments":"Show all comments (%d)","unsaved_changes":"Your profile has unsaved changes. If you leave the page, the changes will be lost.","view":"View","store_filter_settings":""};
/* ]]> */
</script>
<script type='text/javascript' src='wp-content/plugins/buddypress/bp-templates/bp-legacy/js/buddypress.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/buddypress/bp-groups/js/widget-groups.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var samAjax = {"ajaxurl":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-content\/plugins\/simple-ads-manager\/sam-ajax.php","loadurl":"https:\/\/seventhqueen.com\/demo\/sweetdatewp-modern\/wp-content\/plugins\/simple-ads-manager\/sam-ajax-loader.php","load":"","mailer":"1","clauses":"YTo0OntzOjI6IldDIjtzOjI5NDoiKElGKHNhLmFkX3VzZXJzID0gMCwgVFJVRSwgKHNhLmFkX3VzZXJzX3VucmVnID0gMSkpKSBBTkQgKChzYS52aWV3X3R5cGUgPSAxKSBPUiAoc2Eudmlld190eXBlID0gMCBBTkQgKHNhLnZpZXdfcGFnZXMrMCAmIDExKSkgT1IgKHNhLnZpZXdfdHlwZSA9IDIgQU5EIEZJTkRfSU5fU0VUKDE3ODgsIHNhLnZpZXdfaWQpKSkgQU5EIChzYS5hZF9jYXRzID0gMCkgIEFORCAoc2EuYWRfYXV0aG9ycyA9IDApICAgIEFORCBJRihzYS54X2lkLCBOT1QgRklORF9JTl9TRVQoMTc4OCwgc2EueF92aWV3X2lkKSwgVFJVRSkgICAgIjtzOjM6IldDVCI7czozNjg6IiBBTkQgSUYoc2EuYWRfc2NoZWR1bGUsIENVUkRBVEUoKSBCRVRXRUVOIHNhLmFkX3N0YXJ0X2RhdGUgQU5EIHNhLmFkX2VuZF9kYXRlLCBUUlVFKSBBTkQgSUYoc2EubGltaXRfaGl0cywgc2EuaGl0c19saW1pdCA+IChTRUxFQ1QgSUZOVUxMKENPVU5UKCopLCAwKSBGUk9NIHN3ZWV0X3NhbV9zdGF0cyBzcyBXSEVSRSBzcy5pZCA9IHNhLmlkIEFORCBzcy5ldmVudF90eXBlID0gMCksIFRSVUUpIEFORCBJRihzYS5saW1pdF9jbGlja3MsIHNhLmNsaWNrc19saW1pdCA+IChTRUxFQ1QgSUZOVUxMKENPVU5UKCopLCAwKSBGUk9NIHN3ZWV0X3NhbV9zdGF0cyBzcyBXSEVSRSBzcy5pZCA9IHNhLmlkIEFORCBzcy5ldmVudF90eXBlID0gMSksIFRSVUUpIjtzOjM6IldDVyI7czo4MDoiIEFORCBJRihzYS5hZF93ZWlnaHQgPiAwLCAoc2EuYWRfd2VpZ2h0X2hpdHMqMTAvKHNhLmFkX3dlaWdodCoxMDAwKSkgPCAxLCBGQUxTRSkiO3M6NDoiV0MyVyI7czoyMjoiQU5EIChzYS5hZF93ZWlnaHQgPiAwKSI7fQ==","doStats":"1","container":"sam-container","place":"sam-place","ad":"sam-ad"};
/* ]]> */
</script>
<script type='text/javascript' src='wp-content/plugins/simple-ads-manager/js/sam-layout.min.js'></script>
<script type='text/javascript' src='wp-content/themes/sweetdate/assets/scripts/modernizr.foundation.js'></script>
<link rel='https://api.w.org/' href='wp-json/index.html' />
<link rel="canonical" href="index.html" />
<link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embed648e.json?url=https%3A%2F%2Fseventhqueen.com%2Fdemo%2Fsweetdatewp-modern%2F" />
<link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embedb539?url=https%3A%2F%2Fseventhqueen.com%2Fdemo%2Fsweetdatewp-modern%2F&amp;format=xml" />

	<script type="text/javascript">var ajaxurl = 'wp-admin/admin-ajax.html';</script>

<style>
.header-bg {background-color:#000000; background-image: url("wp-content/uploads/2013/06/blurred_bg_01.jpg"); background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#header, #header .form-header .lead, #header label {color:#ffffff;} #header a:not(.button), div#main .widgets-container.sidebar_location .form-search a:not(.button), .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {color:#ffffff;} #header a:not(.button):hover,#header a:not(.button):focus{color:#ffffff;}.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #743349;}#header .top-bar ul > li:hover:not(.name) a {color:#ffffff}; .top-bar ul > li:not(.name):hover a, .top-bar ul > li:not(.name).active a, .top-bar ul > li:not(.name):focus a { color: #ffffff; }.top-bar ul > li.has-dropdown .dropdown:before { border-color: transparent transparent #743349 transparent; }.top-bar ul > li.has-dropdown .dropdown li a {color: #ffffff;background: #743349;}.top-bar ul > li.has-dropdown .dropdown li a:hover,.top-bar ul > li.has-dropdown .dropdown li a:focus { background: #92425d;}.top-bar ul > li.has-dropdown .dropdown li.has-dropdown .dropdown:before {border-color: transparent #743349 transparent transparent;}.lt-ie9 .top-bar section > ul > li a:hover, .lt-ie9 .top-bar section > ul > li a:focus { color: #ffffff; }.lt-ie9 .top-bar section > ul > li:hover, .lt-ie9 .top-bar section > ul > li:focus { background: #743349; }.lt-ie9 .top-bar section > ul > li.active { background: #743349; color: #ffffff; }#breadcrumbs-wrapp {background:#743349; }#breadcrumbs-wrapp, ul.breadcrumbs li:before {color:#f0f0f0;} #breadcrumbs-wrapp a{color:#ffffff;} #breadcrumbs-wrapp a:hover,#breadcrumbs-wrapp a:focus{color:#92425d;}.kleo-page {background:#ffffff; }div#main {color:#777777;}a:not(.button),div#main a:not(.button):not(.elementor-button), #header .form-footer a:not(.button){color:#333333;} div#main a:not(.button):not(.elementor-button):hover, a:not(.button):not(.elementor-button):hover,a:not(.button):focus,div#main a:not(.button):focus{color:#92425d;}div#main .widgets-container.sidebar_location {color:#777777;} div#main .widgets-container.sidebar_location a:not(.button){color:#666666;} div#main .widgets-container.sidebar_location a:not(.button):hover,div#main a:not(.button):focus{color:#92425d;}#footer {background:#171717 url("wp-content/themes/sweetdate/assets/images/patterns/black_pattern.gif"); }#footer, #footer .footer-social-icons a:not(.button), #footer h5{color:#777777;} #footer a:not(.button){color:#743349;} #footer a:not(.button):hover,#footer a:not(.button):focus{color:#92425d;}h1 {font: normal 46px 'Lato'; color: #222222;}h2 {font: normal 30px 'Lato'; color: #222222;}h3 {font: normal 26px 'Lato'; color: #222222;}h4 {font: normal 20px 'Open Sans'; color: #222222;}h5 {font: normal 17px 'Open Sans'; color: #222222;}h6 {font: normal 14px 'Open Sans'; color: #222222;}body, p, div {font: normal 13px 'Open Sans';}.form-search, .form-header, div.alert-box, div.pagination span.current {background:#743349}.top-links, .top-links a, .circular-progress-item input, .ajax_search_image .icon{color: #743349;}.form-search .notch {border-top: 10px solid #743349;}.form-search.custom div.custom.dropdown a.current, .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {background-color: #92425d; }.form-search.custom div.custom.dropdown a.selector, .form-search.custom div.custom.dropdown a.current, .form-search.custom select { border: solid 1px #92425d; }.form-search.custom input[type="text"]::placeholder, .form-search.custom input[type="password"]::placeholder {color: #ffffff;}.form-search.custom input[type="text"],.form-search.custom input[type="password"] {border: 1px solid #743349 }.form-header, div.alert-box {color:#ffffff}.mejs-controls .mejs-time-rail .mejs-time-loaded{background-color: #92425d; }.form-search {border-left: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.form-header {border-left: 10px solid rgba(146, 66, 93, 0.3); border-top: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.tabs.pill.custom dd.active a, .tabs.pill.custom li.active a, div.item-list-tabs ul li a span, #profile .pmpro_label {background: #743349; color: #ffffff;}.tabs.pill.custom dd.active a:after {border-top: 10px solid #743349}.tabs.info dd.active a, .tabs.info li.active a, #object-nav ul li.current a, #object-nav ul li.selected a, .tabs.info dd.active, .tabs.info li.active, #object-nav ul li.selected, #object-nav ul li.current {border-bottom: 2px solid #743349;} .tabs.info dd.active a:after, #object-nav ul li.current a:after, #object-nav ul li.selected a:after {border-top:5px solid #743349;}div.item-list-tabs li#members-all.selected, div.item-list-tabs li#members-personal.selected, .section-members .item-options .selected {border-bottom: 3px solid #743349;} div.item-list-tabs li#members-all.selected:after, div.item-list-tabs li#members-personal.selected:after, .section-members .item-options .selected:after {border-top: 5px solid #743349}.button, ul.sub-nav li.current a, .item-list-tabs ul.sub-nav li.selected a, #subnav ul li.current a, .wpcf7-submit, #rtmedia-add-media-button-post-update, #rt_media_comment_submit, .rtmedia-container input[type="submit"] { border: 1px solid #743349; background: #743349; color: #ffffff; }.button:hover, .button:focus, .form-search .button, .form-search .button:hover, .form-search .button:focus, .wpcf7-submit:focus, .wpcf7-submit:hover, #rtmedia-add-media-button-post-update:hover, #rt_media_comment_submit:hover, .rtmedia-container input[type="submit"]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.button.secondary,.button.dropdown.split.secondary > a, #messages_search_submit, #rtmedia-whts-new-upload-button, #rtMedia-upload-button, #rtmedia_create_new_album,#rtmedia-nav-item-albums-li a,#rtmedia-nav-item-photo-profile-1-li a,#rtmedia-nav-item-video-profile-1-li a,#rtmedia-nav-item-music-profile-1-li a,.bp-member-dir-buttons div.generic-button a.add,.bp-member-dir-buttons div.generic-button a.remove { background-color: #E6E6E6; color: #1D1D1D; border: 1px solid #E6E6E6; }.button.secondary:hover, .button.secondary:focus, .button.dropdown.split.secondary > a:hover, .button.dropdown.split.secondary > a:focus, #messages_search_submit:hover, #messages_search_submit:focus,  #rtmedia-whts-new-upload-button:hover, #rtMedia-upload-button:hover, #rtmedia_create_new_album:hover,#rtmedia-nav-item-albums-li a:hover,#rtmedia-nav-item-photo-profile-1-li a:hover,#rtmedia-nav-item-video-profile-1-li a:hover,#rtmedia-nav-item-music-profile-1-li a:hover,.bp-member-dir-buttons div.generic-button a.add:hover,.bp-member-dir-buttons div.generic-button a.remove:hover { background-color: #DDDCDC;  border: 1px solid #DDDCDC; color: #1D1D1D; }.btn-profile .button.dropdown > ul, .button.dropdown.split.secondary > span {background: #E6E6E6;}.button.dropdown.split.secondary > span:hover, .button.dropdown.split.secondary > span:focus { background-color: #DDDCDC; color: #1D1D1D;}#header .btn-profile a:not(.button) {color: #1D1D1D;}#header .btn-profile .button.dropdown > ul li:hover a:not(.button),#header .btn-profile .button.dropdown > ul li:focus a:not(.button) {background-color: #DDDCDC; color:#1D1D1D;}.button.bordered { background-color: #fff; border: 1px solid #E6E6E6; color: #1D1D1D; }.button.bordered:hover,.button.bordered:focus { background-color: #DDDCDC; border: 1px solid #DDDCDC; color: #1D1D1D; }div#profile {background-color:#FAFAFA; background-image: url("../sweetdatewp/wp-content/uploads/2013/06/blurred_bg_01.jpg"); background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#profile, #profile h2, #profile span {color:#ffffff;} #profile .cite a, #profile .regulartab a, #profile .btn-carousel a {color:#ffffff;} #profile .cite a:hover,#profile .cite a:focus, #profile .regulartab a:hover, #profile .regulartab a:focus, .callout .bp-profile-details:before{color:#743349;}#profile .tabs.pill.custom dd.active a, #profile .pmpro_label {background: #743349 }#profile:after {border-color:#FAFAFA transparent transparent transparent;}#item-header-avatar img, .mySlider img {border-color: rgba(255,255,255,0.1) !important;}#profile .generic-button a, .tabs.pill.custom dd:not(.active) a, #profile .callout, .regulartab dt, .regulartab dd {background: rgba(255,255,255,0.1); color: #ffffff;}#profile hr {border-color: rgba(255,255,255,0.1);}.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button, .rtmedia-item-actions input[type=submit] {border: 1px solid #743349; background: #743349; color: #ffffff; }.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button:hover, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button:hover, .rtmedia-item-actions input[type=submit]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce span.onsale, .woocommerce-page span.onsale{background:#743349;} .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {border: 1px solid #743349;background:#92425d}.woocommerce .widget_layered_nav_filters ul li a, .woocommerce-page .widget_layered_nav_filters ul li a { border: 1px solid #743349; background-color: #743349; color: #ffffff; }.woocommerce div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active:after {border-top:5px solid #743349}.woocommerce #main ul.products li a.view_details_button:not(.button),.woocommerce ul.products li .add_to_cart_button:before,.woocommerce ul.products li .product_type_grouped:before,.woocommerce ul.products li .add_to_cart_button.added:before,.woocommerce ul.products li .add_to_cart_button.loading:before,.woocommerce ul.products li .product_type_external:before,.woocommerce ul.products li .product_type_variable:before, .woocommerce ul.products li .add_to_cart_button.loading,.woocommerce ul.products li .add_to_cart_button,.woocommerce ul.products li .product_type_grouped,.woocommerce ul.products li .view_details_button,.woocommerce ul.products li .product_type_external,.woocommerce ul.products li .product_type_variable{color:#743349}.woocommerce ul.products li .add_to_cart_button:hover:before, .woocommerce ul.products li .product_type_grouped:hover:before, .woocommerce ul.products li .view_details_button:hover:before, .woocommerce ul.products li .product_type_external:hover:before, .woocommerce ul.products li .product_type_variable:hover:before {color: #ffffff;}.woocommerce ul.products li .add_to_cart_button:hover, .woocommerce ul.products li .product_type_grouped:hover, .woocommerce ul.products li .view_details_button:hover, .woocommerce ul.products li .product_type_external:hover, .woocommerce ul.products li .product_type_variable:hover{color: #ffffff;background-color: #92425d}@media only screen and (max-width: 940px) {.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #92425d; }.top-bar { background: #743349; }.top-bar > ul .name h1 a { background: #92425d; }.top-bar ul > li.has-dropdown.moved > .dropdown li a:hover { background: #92425d; display: block; }.top-bar ul > li.has-dropdown .dropdown li.has-dropdown > a li a:hover, .top-bar ul > li.toggle-topbar { background: #92425d; }}@media screen and (max-width: 600px) {#wpadminbar { position: fixed; }}@media screen and ( max-width: 782px ) {.adminbar-enable .sticky.fixed { margin-top: 46px; }}.top-links { border-bottom: none; }
#profile:after { border: none; }


</style>
	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
	
</head>

<body class="home-page bp-legacy home page-template page-template-page-templates page-template-full-builder page-template-page-templatesfull-builder-php page page-id-1788 theme-sweetdate pmpro-body-has-access woocommerce-no-js absolute-head elementor-default elementor-page elementor-page-1788 no-js">

    
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
							
							
															<a class="mail-top" style="" href="mailto:wecare@BEMYSPOUSE.com" title="wecare@BEMYSPOUSE.com">
									<i class="icon-envelope"></i>
									&nbsp; wecare@BEMYSPOUSE.com								</a>
							</li>
						<li class="three columns hide-for-small" style="">
															Find us on: &nbsp;
									<a href="" style="" class="has-tip tip-bottom" data-width="210" target="_blank" title="Follow us on Twitter">
										<i class="icon-twitter icon-large"></i>
									</a>
									<a href="" style="" class="has-tip tip-bottom" data-width="210" target="_blank" title="Find us on Facebook">
										<i class="icon-facebook icon-large"></i>
									</a>
																																												<a href=""  style="" class="has-tip tip-bottom" data-width="210" target="_blank" title="Pin us on Pinterest">
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
					<div id="logo">Sweet Date						<a href="index.html">
							<img id="logo_img"
							     src="wp-content/themes/sweetdate/assets/images/logo.png"
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
							<a href="index.html" class="small-logo"><img
									src="wp-content/themes/sweetdate/assets/images/small_logo.png"
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
		<ul id="menu-sweetdate" class="right"><li id="nav-menu-item-918" ><a href="index.php" class="menu-item menu-item-type-post_type menu-item-object-page main-menu-link">Welcome</a></li>
								
<li id="nav-menu-item-989" ><a href="about-us/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">About us</a></li>

<?php
	if(!isset($_SESSION['mem_id']))
	{
	}else{
?>

<li id="nav-menu-item-989" ><a href="members/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">Members</a></li>
<li id="nav-menu-item-989" ><a href="forum/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">Group Forums</a></li>

<?php
	}
?>

<li id="nav-menu-item-989" ><a href="contact/index.php" class="menu-item menu-item-type-custom menu-item-object-custom main-menu-link">Contact</a></li>

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

<!-- MAIN SECTION
================================================ -->
<section>
	<div id="main" class="full-builder">
		
		
			<div id="main-content">
				
													
					
<!-- Begin Article -->
<div class="row">

	
	
	<div class="twelve columns">
		<div class="article-content">
		<div data-elementor-type="wp-post" data-elementor-id="1788" class="elementor elementor-1788 elementor-bc-flex-widget" data-elementor-settings="[]">
			<div class="elementor-inner">
				<div class="elementor-section-wrap">
			<section class="elementor-element elementor-element-6de8c17e sq-tablet-pos-absolute sq-mobile-pos-relative elementor-section-boxed elementor-section-height-default elementor-section-height-default sq-pos-relative elementor-section elementor-top-section" data-id="6de8c17e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" style="padding-bottom: 90px;">
						<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
				<div class="elementor-element elementor-element-2b603871 elementor-column elementor-col-33 elementor-top-column" data-id="2b603871" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-36833f57 elementor-widget elementor-widget-register-form" data-id="36833f57" data-element_type="widget" data-widget_type="register-form.default">
				<div class="elementor-widget-container">
			
	<div class="form-wrapper">
		<div class="form-header">
			<h1 class="white-text">
			Hookup for fun, dating and relationship...			</h1>
			<p class="reg-form-details">
				<p>... with new and interesting people near you.
	<br>
	<br>
Join BEMYSPOUSE - Free hookup site for dating and relationships, where you could meet anyone, anywhere!</p>			</p>
		</div>
		<!--Search form-->
		<form id="register_form_front" action="" method="post" class="custom form-search">

			<div class="row"><!--offset-by-five columns-->
				<div class="seven">
					<?php echo $joinUs; ?>
				</div>
			</div>
			<span class="notch"></span>
		</form>
		<!--end search form-->



		
	</div><!--end form-wrapper-->

		</div>
				</div>
						</div>
			</div>
		</div>
				<div class="elementor-element elementor-element-15fca109 elementor-column elementor-col-33 elementor-top-column" data-id="15fca109" data-element_type="column">
			<div class="elementor-column-wrap">
					<div class="elementor-widget-wrap">
						</div>
			</div>
		</div>
				<div class="elementor-element elementor-element-54cd9724 elementor-column elementor-col-33 elementor-top-column" data-id="54cd9724" data-element_type="column">
			<div class="elementor-column-wrap">
					<div class="elementor-widget-wrap">
						</div>
			</div>
		</div>
						</div>
			</div>
		</section>
				<section class="elementor-element elementor-element-6408ab11 elementor-section-boxed elementor-section-height-default elementor-section-height-default sq-pos-relative elementor-section elementor-top-section" data-id="6408ab11" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
				<div class="elementor-element elementor-element-1f0cb59a elementor-column elementor-col-100 elementor-top-column" data-id="1f0cb59a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-3e5cd6a1 elementor-widget elementor-widget-text-editor" data-id="3e5cd6a1" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><h1>It all starts with a <span style="color: #f10049;">Date</span></h1></div>
				</div>
				</div>
				<div class="elementor-element elementor-element-5af44494 elementor-widget elementor-widget-text-editor" data-id="5af44494" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">

				<?php
					if(isset($_SESSION['mem_id']))
					{
					}else{
				?>

					<div class="elementor-text-editor elementor-clearfix"><p>
					Thousands of singles find love through our dating sites each month. Register today to find that special someone on BEMYSPOUSE. We believe that real happiness starts with a truly like-minded match, which is why our passion is helping compatible singles connect. If you're serious about finding lasting love, then BEMYSPOUSE is the Nigerian dating site for you. We validate every profile to ensure that we introduce you to interesting, like-minded Nigerian singles. Not only are the majority of our members educated and successful, single professionals aged 30-55, but they are all committed to finding genuine love through internet dating. <br>
					 <span style="color: #000000;"><strong>Joining us today just got easier!</strong></span>
					</p></div>

				<?php
					}
				?>
				
				</div>
				</div>
				<section class="elementor-element elementor-element-7d792783 elementor-section-boxed elementor-section-height-default elementor-section-height-default sq-pos-relative elementor-section elementor-inner-section" data-id="7d792783" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
			
						</div>
			</div>
		</section>
				<section class="elementor-element elementor-element-e6c410b elementor-section-boxed elementor-section-height-default elementor-section-height-default sq-pos-relative elementor-section elementor-inner-section" data-id="e6c410b" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
				<div class="elementor-element elementor-element-3ad3dc3d elementor-column elementor-col-25 elementor-inner-column" data-id="3ad3dc3d" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-ad6741a elementor-widget elementor-widget-image" data-id="ad6741a" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
					<div class="elementor-image">
										<img width="213" height="149" src="wp-content/uploads/2018/07/status_01.png" class="elementor-animation-pulse-grow attachment-large size-large" alt="" />											</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-6d4c3bff elementor-align-center elementor-widget elementor-widget-member-stats" data-id="6d4c3bff" data-element_type="widget" data-widget_type="member-stats.default">
				<div class="elementor-widget-container">
			<span class="member-statistic">
				<?php
								$sql1 = "select * from members where status='1'"; 
								$res1=mysqli_query($con,$sql1);
								$count1 = mysqli_num_rows($res1); 
								echo $count1;
							?>
			</span>		</div>
				</div>
				<div class="elementor-element elementor-element-70792c3b elementor-widget elementor-widget-text-editor" data-id="70792c3b" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><p>Members in total</p></div>
				</div>
				</div>
						</div>
			</div>
		</div>
				<div class="elementor-element elementor-element-113348f8 elementor-column elementor-col-25 elementor-inner-column" data-id="113348f8" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4824b22e elementor-widget elementor-widget-image" data-id="4824b22e" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
					<div class="elementor-image">
										<img width="213" height="149" src="wp-content/uploads/2018/07/status_02.png" class="elementor-animation-pop attachment-large size-large" alt="" />											</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-7e3405e7 elementor-align-center elementor-widget elementor-widget-member-stats" data-id="7e3405e7" data-element_type="widget" data-widget_type="member-stats.default">
				<div class="elementor-widget-container">
			<span class="member-statistic">
				<?php
								$sql2 = "select * from groups where status='1'"; 
								$res2=mysqli_query($con,$sql2);
								$count2 = mysqli_num_rows($res2); 
								echo $count2;
							?>
			</span>		</div>
				</div>
				<div class="elementor-element elementor-element-5ccc5e87 elementor-widget elementor-widget-text-editor" data-id="5ccc5e87" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><p>Groups online</p></div>
				</div>
				</div>
						</div>
			</div>
		</div>
				<div class="elementor-element elementor-element-7862a6ef elementor-column elementor-col-25 elementor-inner-column" data-id="7862a6ef" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-103637b7 elementor-widget elementor-widget-image" data-id="103637b7" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
					<div class="elementor-image">
										<img width="213" height="149" src="wp-content/uploads/2018/07/status_03.png" class="elementor-animation-pop attachment-large size-large" alt="" />											</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-438e7075 elementor-align-center elementor-widget elementor-widget-member-stats" data-id="438e7075" data-element_type="widget" data-widget_type="member-stats.default">
				<div class="elementor-widget-container">
			<span class="member-statistic">
				<?php
								$sql3 = "select * from members where gender='Woman' and status='1'"; 
								$res3=mysqli_query($con,$sql3);
								$count3 = mysqli_num_rows($res3); 
								echo $count3;
							?>
			</span>		</div>
				</div>
				<div class="elementor-element elementor-element-71bd8176 elementor-widget elementor-widget-text-editor" data-id="71bd8176" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><p>Women online</p></div>
				</div>
				</div>
						</div>
			</div>
		</div>
				<div class="elementor-element elementor-element-6aa434c3 elementor-column elementor-col-25 elementor-inner-column" data-id="6aa434c3" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-9f4d7fe elementor-widget elementor-widget-image" data-id="9f4d7fe" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
					<div class="elementor-image">
										<img width="213" height="149" src="wp-content/uploads/2018/07/status_04.png" class="elementor-animation-grow-rotate attachment-large size-large" alt="" />		
					</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-2d07593c elementor-align-center elementor-widget elementor-widget-member-stats" data-id="2d07593c" data-element_type="widget" data-widget_type="member-stats.default">
				<div class="elementor-widget-container">
			<span class="member-statistic">
				<?php
					$sql4 = "select * from members where gender='Man' and status='1'"; 
					$res4=mysqli_query($con,$sql4);
					$count4 = mysqli_num_rows($res4); 
					echo $count4;
				?>
			</span>		
				</div>
				</div>
				<div class="elementor-element elementor-element-2511e311 elementor-widget elementor-widget-text-editor" data-id="2511e311" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><p>Men online</p></div>
				</div>
				</div>
					</div>
			</div>
		</div>
						</div>
			</div>
		</section>
						</div>
			</div>
		</div>
						</div>
			</div>
		</section>
		
		<?php
					if(isset($_SESSION['mem_id']))
					{
					}else{
				?>
	
				<section class="elementor-element elementor-element-48f77f31 elementor-section-boxed elementor-section-height-default elementor-section-height-default sq-pos-relative elementor-section elementor-top-section" data-id="48f77f31" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
				<div class="elementor-element elementor-element-3ab2bf9f elementor-column elementor-col-100 elementor-top-column" data-id="3ab2bf9f" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4db9323b elementor-widget elementor-widget-text-editor" data-id="4db9323b" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><h2>REASONS TO <span style="color: #f10049;">JOIN</span></h2></div>
				</div>
				</div>
				<div class="elementor-element elementor-element-228854f2 elementor-widget elementor-widget-top-members" data-id="228854f2" data-element_type="widget" data-widget_type="top-members.default">
				<div class="elementor-widget-container">
			

				<div class="twelve columns" style="margin-bottom: 50px;">
		<div class="article-content">
<div class="four columns"><div class="circle-image " style="border: 2px solid lightgrey; border-radius: 50px;">  <a class="imagelink" data-rel="prettyPhoto[gallery1]" href="wp-content/uploads/2013/06/small_thumb_01.png">
				<span class="overlay"></span>
				<span class="read"><i class="icon-heart"></i></span>
				<img src="wp-content/uploads/2013/06/small_thumb_01.png" style=" border-radius: 50px;" alt="">
			</a>
		</div> <h4>100% FREE and Secure</h4> Your account is safe on BEMYSPOUSE - Free hookup site for dating and relationships. We never share your data with third party. </div> <div class="four columns"> <div class="circle-image " style="border: 2px solid lightgrey; border-radius: 50px;">  <a class="imagelink" data-rel="prettyPhoto[gallery1]" href="wp-content/uploads/2013/06/small_thumb_03.png">
				<span class="overlay"></span>
				<span class="read"><i class="icon-heart"></i></span>
				<img src="wp-content/uploads/2013/06/small_thumb_02.png" style=" border-radius: 50px;" alt="">
			</a>
		</div> <h4>Matching compatible partner</h4> Based on your location, we find best and suitable matches for you. </div> 
		<div class="four columns"> 
		
			<div class="circle-image " style="border: 2px solid lightgrey; border-radius: 50px;">  <a class="imagelink" data-rel="prettyPhoto[gallery1]" href="wp-content/uploads/2013/06/small_thumb_03.png">
					<span class="overlay"></span>
					<span class="read"><i class="icon-heart"></i></span>
					<img src="wp-content/uploads/2013/06/small_thumb_03.png" style=" border-radius: 50px;" alt="">
				</a>
			</div> <h4>Share experiences</h4> You have access to group forums where you can meet other couples and share success stories and experiences. 
		</div>
		</div><!--end article-content-->
		
		
	</div>
		
		<div style=" width: 100%; text-align: center;">
		
					<a href='#' data-reveal-id='register_panel'>
						<button class='button radius front-form-button'><i class='icon-heart'></i>
						&nbsp; JOIN US NOW</button>
					</a>
		</div>
	
			</div>
				</div>
						</div>
			</div>
		</div>
						</div>
			</div>
		</section>

<?php
					}
?>

<?php
					if(!isset($_SESSION['mem_id']))
					{
					}else{
				?>
				<section class="elementor-element elementor-element-1b644809 elementor-section-boxed elementor-section-height-default elementor-section-height-default sq-pos-relative elementor-section elementor-top-section" data-id="1b644809" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
				<div class="elementor-element elementor-element-672a9bba elementor-column elementor-col-100 elementor-top-column" data-id="672a9bba" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-32f76cd5 elementor-widget elementor-widget-text-editor" data-id="32f76cd5" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><h2>RECENTLY ADDED <span style="color: #f10049;">GROUPS</span></h2></div>
				</div>
				</div>
				<div class="elementor-element elementor-element-9d976f3 elementor-widget elementor-widget-recent-groups" data-id="9d976f3" data-element_type="widget" data-widget_type="recent-groups.default">
				<div class="elementor-widget-container">
			<div id="groups" class="">
					<?php
						
						$sql = "SELECT * FROM groups where status='1' order by 1 desc limit 0,4";
											$run = mysqli_query($con, $sql);
											while($row = mysqli_fetch_array($run)){
												$gr_id=$row['id'];
												$gr_admin=$row['g_admin'];
												$gr_name=$row['g_name'];
												$gr_desc=$row['g_desc'];
												$date_cr=$row['date_created'];
												$gr_pic=$row['picture'];
												$gr_stat=$row['status'];
												
												$sqlgra = "SELECT * FROM members where id='$gr_admin'";
												$rungra = mysqli_query($con, $sqlgra);
												while($row = mysqli_fetch_array($rungra)){
													$mem_id=$row['id'];
													$f_name=$row['f_name'];
													$m_name=$row['m_name'];
													$l_name=$row['l_name'];
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
												
												$sqlgrm = "select * from group_members where g_id='$gr_id'"; 
												$resgrm=mysqli_query($con,$sqlgrm);
												$countgrm = mysqli_num_rows($resgrm); 
												
												echo "
													<div class='six columns group-item'>
						<div class='five columns'>
							<div class='item-header-avatar'>
								<div class='circular-item' title=''>
									<small class='icon'>members</small>
									<input type='text' value='$countgrm' class='pinkCircle'>
								</div>
								<img src='forum/photos/$gr_pic' class='avatar group-4-avatar avatar-300 photo' style='width: 150px; height: 150px;' alt='Group logo of $gr_name' />
							</div>
						</div>
						<h4><a href='forum/group/index.php?gid=$gr_id'>$gr_name</a></h4>
						<p>$gr_desc</p>
						<p><a href='forum/group/index.php?gid=$gr_id'>View group <i class='icon-caret-right'></i></a></p>
					</div>
												";
												
											}
					
					?>
			
			
			
					<!--end six-->
					<!--end six--></div>
					
					<div class="clear clearfix"></div><script type="text/javascript">
jQuery(function () {
    if (!isMobile()) {
		jQuery(".item-header-avatar img").each(function (i) {
			jQuery(this).attr('data-src' ,jQuery(this).attr('src'));
			jQuery(this).attr('src', kleoFramework.blank_img);
		});

		jQuery('#groups').one('inview', function (event, visible) {
			if (visible) {
				var container = "#groups";

				jQuery(container+" .item-header-avatar img").each(function (i) {
					var element = jQuery(this);
					var delayInterval = 250; // milliseconds
					jQuery(this).delay(i * delayInterval).fadeOut(function() { element.attr('src' ,jQuery(this).attr('data-src')); element.fadeIn() });
				});

			}
		});
	}

});
</script>		</div>
				</div>
						</div>
			</div>
		</div>
						</div>
			</div>
		
		<div style=" width: 100%; text-align: center; margin-top: 30px;">
		
					<a href='forum/index.php'>
						<button class='button radius front-form-button'><i class='icon-group'></i>
						&nbsp; View all Groups</button>
					</a>
		</div>
		</section>



		<section class="elementor-element elementor-element-48f77f31 elementor-section-boxed elementor-section-height-default elementor-section-height-default sq-pos-relative elementor-section elementor-top-section" data-id="48f77f31" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
				<div class="elementor-element elementor-element-3ab2bf9f elementor-column elementor-col-100 elementor-top-column" data-id="3ab2bf9f" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4db9323b elementor-widget elementor-widget-text-editor" data-id="4db9323b" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><h2>POPULAR <span style="color: #f10049;">MEMBERS</span></h2></div>
				</div>
				</div>
				<div class="elementor-element elementor-element-228854f2 elementor-widget elementor-widget-top-members" data-id="228854f2" data-element_type="widget" data-widget_type="top-members.default">
				<div class="elementor-widget-container">
			

    <div class="section-members ">
        <div class="item-options" id="members-list-options">
        </div>
			
	<ul class="item-list kleo-bp-newest-members">
	
		<?php
			$sql = "SELECT * FROM members where status='1' order by rand() desc limit 0,20";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$mem_id=$row['id'];
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
												
												$userJoined = date("jS M Y",strtotime("".$dj.""));
											
												
												echo "
													<li class='two columns mobile-two top-newest-members'>
        <div class='item-avatar'>
          <a href='members/profile/index.php?uid=$mem_id' title='$f_name $m_name $l_name'><img src='members/photos/$pic' class='avatar user-45443-avatar avatar-125 photo' style='width: 125px; height: 125px;'  alt='Profile picture of $f_name $m_name $l_name' /></a>
        </div><!--end item-avatar-->
        <div class='item'>
          <div class='item-title fn'><a href='members/profile/index.php?uid=$mem_id' title='$f_name $m_name $l_name'>$f_name $l_name</a></div>
          <div class='item-meta'>
            <span class='activity'>Joined: $userJoined</span>
          </div>
        </div><!--end item-->
    </li>
												";
											}
		?>
	
	
	</ul>
	</div><!--end section-members--><script type="text/javascript">
jQuery(document).ready(function() {

    jQuery(".members-switch").click(function() {
        var bpMembersContext = jQuery(this).parent().parent();
        var container = "ul.kleo-bp-"+jQuery(this).attr('data-id')+"-members";

        jQuery("ul.item-list", bpMembersContext).hide();
        jQuery(".members-switch").removeClass("selected");
        jQuery(this).addClass("selected");
        jQuery(container, bpMembersContext).show(0, function() {
            jQuery(container+" li").hide().each(function (i) {
                var delayInterval = 150; // milliseconds
                jQuery(this).delay(i * delayInterval).fadeIn();
            });
        });
        return false;
    });
});

jQuery(function () {
	if (!isMobile()) {
		jQuery('.kleo-bp-active-members').hide();
		jQuery('.section-members').one('inview', function (event, visible) {
		  if (visible) {
			  var container = ".kleo-bp-active-members";
			  jQuery(container).show(0, function() {
				  jQuery(container+" li").hide().each(function (i) {
					  var delayInterval = 150; // milliseconds
					  jQuery(this).delay(i * delayInterval).fadeIn();
				  });
			  });
		  }
		});
	}

});

</script>		</div>
				</div>
						</div>
			</div>
		</div>
						</div>
			</div>
		
		<div style=" width: 100%; text-align: center;">
		
					<a href='members/index.php'>
						<button class='button radius front-form-button'><i class='icon-user'></i>
						&nbsp; View all Members</button>
					</a>
		</div>
		</section>

	<?php
					}
	?>

						</div>
			</div>
		</div>
				</div><!--end article-content-->
	</div><!--end twelve-->
</div><!--end row-->
<!-- End  Article -->





				
							</div><!--end twelve-->
		
	</div><!--end main-->
	
	
</section>
<!--END MAIN SECTION-->



<!-- TESTIMONIALS SECTION ================================================ -->
<section class="with-top-border">
  	<div class="row">
    	<div class="twelve columns">
        <div id="kleo_testimonials-2" class="widgets clearfix widget_kleo_testimonials">
		<ul class="testimonials-carousel">
		<div class="elementor-text-editor elementor-clearfix"><h2 style="text-align: center;">SUCCESS <span style="color: #f10049;">STORIES</span></h2></div>
		<?php 
											$sql = "SELECT * FROM testimonials where status='1'";
											$run = mysqli_query($con, $sql);
											$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$testi_id=$row['id'];
												$testi_name=$row['fullname'];
												$jdesc=$row['job_desc'];
												$comp=$row['company'];
												$testi=$row['testimony'];
												$date_add=$row['date_added'];
												$w_stat=$row['status'];
											
												echo "
													<li >
														<div class='quote-content'>
															<i class='icon-quote-right iconq'></i>
															<p>$testi</p>
														</div>
														<div class='quote-author'>
															<strong>$testi_name</strong>
															<span class='author-description'> - $jdesc, $comp</span>
														</div>
													</li>
												";
											}									
		?>
		
		
													
						
		</ul>

		</div>      </div>
    </div>
</section>
<!--END TESTIMONIALS SECTION-->

<?php include('_inc/footer.php'); ?>