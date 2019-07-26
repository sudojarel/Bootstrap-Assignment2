<?php
session_start();
include("database_connect.php");

$query = "
 Select * From USER WEHERE userID ='".$_SESSION["userID"]."'";
$result= mysqli_query($connect,$query);
if(mysqli_num_rows($result) > 0)
{
	$row = mysqli_fetch_assoc($result);
	echo "Name: ". $row['username']."/n";
	echo "FirstName: ". $row['fname']."/n";
	echo "LastName: ". $row['lname']."/n";
	echo "Email: ". $row['email']."/n";
}


?>
<a href ="edit.php">Update Your Profile</a>
