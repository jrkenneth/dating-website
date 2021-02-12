
<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysql_select_db("dating", $connection); // Selecting Database
//Fetching Values from URL
$comm2=$_POST['comm1'];
$user2=$_POST['user1'];
$group2=$_POST['group1'];
//Insert query
$query = mysql_query("insert into forum_thread(userid, groupid, text) values ('$user2', '$group2', '$comm2')");
echo "Comment Submitted Succesfully";
mysql_close($connection); // Connection Closed
?>
