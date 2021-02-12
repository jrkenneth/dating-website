<?php 

require_once('../_includes/dbconnect.php');
$getID = $_GET['del'];

$sqlx = "DELETE FROM admin WHERE id = '$getID'";
$runx = mysqli_query($con, $sqlx);

if($runx){
	echo "<script>alert('Admin Removed Successfully!')</script>";
	echo "<script>document.ready(window.setTimeout(location.href = 'index.php',1000));</script>";
}else{
	echo "<script>alert('Error Removing Admin')</script>";
	echo "<script>document.ready(window.setTimeout(location.href = 'index.php',1000));</script>";
}
?>