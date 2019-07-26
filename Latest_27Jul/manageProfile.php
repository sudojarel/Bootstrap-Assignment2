<?php
session_start();  
include('database_connect.php');


$query = "  
      SELECT * FROM USER  
      WHERE userID = '".$_SESSION["userID"]."'   
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {   
		$row = mysqli_fetch_assoc($result);
			echo "YOUR NAME IS ". $row['username'] ."/n";
			echo "email: " .$row['email'];
         
      }  
     
?>