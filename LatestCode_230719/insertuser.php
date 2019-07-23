<?php
//insert.php  
session_start();
include('database_connect.php');
if(!empty($_POST))
{
	$output = '';
	$uname = mysqli_real_escape_string($connect, $_POST["uname"]);  
    $fname = mysqli_real_escape_string($connect, $_POST["fname"]);  
    $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
    $email = mysqli_real_escape_string($connect, $_POST["email"]);  
    $role = mysqli_real_escape_string($connect, $_POST["role"]);  	
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $hashpw = password_hash($password, PASSWORD_DEFAULT);  

    $sql = "SELECT * FROM USER WHERE email='$email' or username = '$uname'";
    $count = 0;
    if ($result=mysqli_query($connect,$sql))
    {
    // Return the number of rows in result set
    $count=mysqli_num_rows($result);  
    }
    if ($count > 0) {
      $output .= '<label class="text-danger">Same username or email already exists</label>';
     $select_query = "SELECT * FROM USER ORDER BY userID DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Product Name</th>  
                         <th width="30%">View</th>  
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["username"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["userID"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    else{
       $query = "
    INSERT INTO USER(username, firstName, lastName, email, password ,role)  
     VALUES('$uname', '$fname', '$lname', '$email', '$hashpw', '$role')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM USER ORDER BY userID DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Product Name</th>  
                         <th width="30%">View</th>  
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["username"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["userID"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
        }
    }


    
    echo $output;
}
?>