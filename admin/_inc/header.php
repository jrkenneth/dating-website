<?php
ob_start();
session_start();
error_reporting(0);
require_once('../_include/dbconnect.php');
		if(!isset($_SESSION['aid']))
		{
			header("Location: login.php");
		}else{
			$aid=$_SESSION['aid'];
			
			$sql = "SELECT * FROM `admins` where id = '$aid'";
				$run = mysqli_query($con, $sql);
				while($row = mysqli_fetch_array($run)){
					$mainid = $row['id'];
					$fname = $row['fname'];
					$lname = $row['lname'];
					$uname = $row['uname'];
					$pword = $row['password'];
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
    <title>BEMYSPOUSE - ADMIN PORTAL</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
	
	
    <link rel="icon" href="../logo/logo.png" />
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
    <header style="background: #590E3A;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong style="display: none;">&nbsp;&nbsp; | &nbsp;&nbsp;</strong>
                    
                    <strong style="text-transform: uppercase;"><?php echo $fname." ".$lname; ?></strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero" style="background: #7A1651;">
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
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a href="#">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Dashboard</a></li>
                            <li><a href="members.php">Members</a></li>
                            <li><a href="groups.php">Groups</a></li>
                            <li><a href="enquiries.php">Enquiries</a></li>
                            <li><a href="newsletter.php">Newsletter Broadcasts</a></li>
                            <li><a href="testimonials.php">Testimonials</a></li>
                            <li><a href="admins.php">Admins</a></li>
                            <li><a href="login.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->