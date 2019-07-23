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
//register.php  
include('database_connect.php');
$connect = mysqli_connect($servername, $dbusername, $password, $dbname);
$username = $_POST['username'];
$email = $_POST['email'];
$sql = "SELECT * FROM USER WHERE email='$email' or username = '$username'";
$output = '';
$count = 0;
if ($result=mysqli_query($connect,$sql))
  {
  // Return the number of rows in result set
  $count=mysqli_num_rows($result);  
 }
  if ($count > 0) {
  	  $output .= '<label class="text-danger"><span style="font-size: 20px";>Username or email exists, please try another username/email</span></label>';
  	}
elseif ($count == 0)
{
    $username = mysqli_real_escape_string($connect, $_POST["username"]);  
	$fname = mysqli_real_escape_string($connect, $_POST["fname"]);  
    $lname = mysqli_real_escape_string($connect, $_POST["lname"]);  
    $email = mysqli_real_escape_string($connect, $_POST["email"]); 
    $password = mysqli_real_escape_string($connect, $_POST["pw"]);	
	$hashpw = password_hash($password, PASSWORD_DEFAULT);  
	$role = "USR";
    $query = "
    INSERT INTO USER(username, firstName, lastName, email, password, role)  
     VALUES('$username', '$fname', '$lname', '$email','$hashpw', '$role')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success"><span style="font-size: 20px";>Successfully Registered</span></label>';
	

	
}
}
 echo $output;
 echo "<p>You will be redirected to the home page in a few seconds </p>";
 header('Refresh: 3; URL=index2.php');
?>
</html>