
<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysql_select_db("dating", $connection); // Selecting Database
//Fetching Values from URL
$mess2=$_POST['mess1'];
$myid2=$_POST['myid1'];
$user2=$_POST['user1'];
$code2=$_POST['code1'];
//Insert query
$query = mysql_query("insert into conversations(sender, receiver, message, code) values ('$myid2', '$user2', '$mess2', '$code2')");
echo "Message Submitted Succesfully";
mysql_close($connection); // Connection Closed
?>
