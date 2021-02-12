<?php
ob_start();
error_reporting(0);
session_start();
require_once('../_include/dbconnect.php');
if(isset($_GET['logout']))
{
	//session_destroy();
	unset($_SESSION['aid']);
	header("Location: login.php");
}

$error="";

if( isset($_POST['log']) ) 
{
	
	$un=$_POST['user'];
	$pass=$_POST['pw'];	
								
	$sql="SELECT * FROM admins WHERE uname='$un' and password='$pass' and desig='admin'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
			
	if($count == 1) 
	{
	$id = $row['id'];

	$_SESSION['aid'] = $id;

	header("Location: index.php");
	setcookie($must,"",time()-3600);

	}else {
		$error = "<span style='color: darkred; font-size: 15px; font-weight: bold;'>Incorrect Credentials, Try again...</span>";
	}
		
}	
			
?>	

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>BEMYSPOUSE - ADMIN LOGIN</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="icon" href="logo/logo.png" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	
	
		<style>
	.user-settings-wrapper .nav > li > a:hover,.user-settings-wrapper .nav > li > a:focus {
        text-decoration: none;
        background-color: #7A1651!important;
    }
	
	.menu-top-active {
    background-color: #7A1651;
}
.navbar-inverse {
    background-color: #7A1651;
    border-color: transparent;
}
footer {
    padding: 10px;
    color: #fff;
    font-size: 12px;
    background-color: #7A1651;
}

.page-head-line {
    font-weight: 900;
    padding-bottom: 20px;
    border-bottom: 2px solid #590E3A;
    text-transform: uppercase;
    color: #590E3A;
    font-size: 20px;
    margin-bottom: 40px;
}
.login-icon {
    height: 60px;
width: 60px;
padding: 13px;
border-radius: 50%;
font-size: 30px;
margin-bottom: 20px;
color: #fff;
text-align: center;
cursor:pointer;
background-color:#590E3A;
-webkit-border-radius:50%;
    -moz-border-radius:50%;
}
header {
    background-color: #590E3A;
    color: #fff;
    padding: 10px;
    text-align: right;
}
.user-settings-wrapper .nav > li > a {
    position: relative;
    display: block;
    padding: 15px 18px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    height: 60px;
    width: 60px;
    background-color: #590E3A;
    color: #fff;
}
.menu-section .nav > li > a:hover,.menu-section .nav > li > a:focus {
    background-color: #590E3A!important;
}

.menu-section .dropdown-menu > li > a:hover,.menu-section .dropdown-menu > li > a:focus {
    background-color: #590E3A!important;
}
.navbar-toggle {
    background-color: #590E3A;
    border: 1px solid #fff;
}
	</style>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@BEMYSPOUSE.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>(+234) 123-45-6789
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="text-align: center; color: white; font-weight: bold; font-family: rockwell; font-size: 28px; line-height: 30px; padding: 45px;">
				BEMYSPOUSE	<br><span style="font-weight: normal; font-family: arial; font-size: 20px;">ADMIN PORTAL</span>
                </a>

            </div>

            <div class="left-div">
                <i class="fa fa-lock login-icon" ></i>
        </div>
            </div>
        </div>
    <!-- LOGO HEADER END-->
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper" style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Proceed</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
				<form action="" method="post">
                        <label>Username / Login ID :  </label>
                        <input type="text" name="user" class="form-control" />
                        <label>Password :  </label>
                        <input type="password" name="pw" class="form-control" />
                        <hr />
                        <button class="btn btn-info" name="log" style="background: #590E3A; color: white;"><span class="fa fa-sign-in"></span> &nbsp;LOGIN </button>  <?php echo $error; ?>
				</form>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-warning" style="color: #590E3A;">
                         <strong> INSTRUCTIONS TO USE:</strong>
                        <ul>
                            <li>
                                 ENTER YOUR USERNAME
                            </li>
                            <li>
                                 CAREFULLY ENTER A CORRECT PASSWORD
                            </li>
                            <li>
                               CLICK THE LOGIN BUTTON TO ACCESS YOUR DASHBOARD
                            </li>
                        </ul>
                       
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; <?php echo date("Y"); ?> BEMYSPOUSE
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
