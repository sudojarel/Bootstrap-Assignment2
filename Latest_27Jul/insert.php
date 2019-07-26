<?php
//insert.php  
include('database_connect.php');
if(!empty($_POST))
{
	$output = '';
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$pname = mysqli_real_escape_string($connect, $_POST["pname"]);  
    $desc = mysqli_real_escape_string($connect, $_POST["desc"]);  
    $type = mysqli_real_escape_string($connect, $_POST["type"]);
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  	
    $brand = mysqli_real_escape_string($connect, $_POST["brand"]);  
	$price = mysqli_real_escape_string($connect, $_POST["price"]);
	$filename = $_FILES["fileToUpload"]["name"];	
    $query = "
    INSERT INTO PRODUCT(product_name, product_type, product_brand, product_price, product_description ,product_gender, product_image, product_status)  
     VALUES('$pname', '$type', '$brand', '$price', '$desc', '$gender', '$filename', 'A')
    ";
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM PRODUCT ORDER BY product_id DESC";
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
                         <td>' . $row["product_name"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["product_id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>
