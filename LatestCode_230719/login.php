<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hang - Official Clothing Megastore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="ajax_response.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="javascript/main.js"></script>
  <script src="javascript/validation.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" href="css/validation.css">
</head>
<?php  
session_start();  
include('database_connect.php');
$output = '';
$connect = mysqli_connect($servername, $username, $password, $dbname);
$password = mysqli_real_escape_string($connect, $_POST["password"]);	
$query = "  
      SELECT * FROM USER  
      WHERE username = '".$_POST["username"]."'   
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {   
		$row = mysqli_fetch_assoc($result);
			if((password_verify($password, $row['password']))){
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['loggedin'] = true;	
		 		$_SESSION['role'] = $row['role'];
           $output .= '<label class="text-success"><span style="font-size: 20px";>Login successful!</span></label>';
			}
         
      }  
      else  
      {  
          $output .= '<label class="text-danger"><span style="font-size: 20px";>Invalid login details. Please try again</span></label>';
      }  
 echo $output;	  
 echo "<p>You will be redirected to the home page in a few seconds </p>";
 header('Refresh: 3; URL=index2.php');
 
 
 ?>  
 </html>