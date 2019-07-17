<?php

//fetch_data.php

include('database_connect.php');

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM PRODUCT WHERE product_status = 'A'
 ";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
   AND product_brand IN('".$brand_filter."')
  ";
 }
 if(isset($_POST["producttype"]))
 {
  $producttype_filter = implode("','", $_POST["producttype"]);
  $query .= "
   AND product_type IN('".$producttype_filter."')
  ";
 }
 if(isset($_POST["gender"]))
 {
  $gender_filter = implode("','", $_POST["gender"]);
  $query .= "
    AND product_gender IN('".$gender_filter."')
  ";
 }

 //$statement = $connect->prepare($query);
 //$statement->execute();
 //$result = $statement->fetchAll();
 $result = mysqli_query($connect, $query);  
 $rowcount = mysqli_num_rows($result);
 $output = '';
 if($rowcount > 0)
 {
  while($row = $result->fetch_assoc())
  {
   $output .= '
   <div class="col-sm-4 col-lg-3 col-md-3">
    <div class = "viewProd">
     <img src="images/'. $row['product_image'] .'" alt="" class="img-responsive"  width="150" height="200">
     <p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
     <h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
     <p>Description : '. $row['product_description'].'<br />
     Brand : '. $row['product_brand'] .' <br />
     Type : '. $row['product_type'] .'<br />
     Gender : '. $row['product_gender'] .' </p>
    </div>

   </div>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
 
}

?>

