<?php   
session_start();
include('database_connect.php');
include_once 'Cart.class.php'; 
$cart = new Cart; 
 ?> 
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
   <link href = "css/jquery-ui.css" rel = "stylesheet">
  <script src="javascript/main.js"></script>
  <script src="javascript/validation.js"></script>
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" href="css/validation.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="javascript/cart.js"></script>
</head>
<body>
    <?php include('nav.php'); ?>
	<div class="container">

  <h1 class="font-weight-light text-center mt-4 mb-0">Search Results</h1>
  
  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">

<?php
//searchResult.php  
include('database_connect.php');
if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['search']);
      $query ="SELECT * FROM PRODUCT WHERE product_name like '%" . $aKeyword[0] . "%'";
	  $output ='';
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR product_name like '%" . $aKeyword[$i] . "%'";
        }
      }
	  
	  $query .= " OR product_type like '%" . $aKeyword[0] . "%'";
	  
	   for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR product_type like '%" . $aKeyword[$i] . "%'";
        }
      }
	  
	  $query .= " OR product_brand like '%" . $aKeyword[0] . "%'";
	  
	  for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR product_brand like '%" . $aKeyword[$i] . "%'";
        }
      }
	  
	  $query .= " OR product_description like '%" . $aKeyword[0] . "%'";
	  
	  for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR product_description like '%" . $aKeyword[$i] . "%'";
        }
      }
	  
	  $query .= " OR product_gender like '%" . $aKeyword[0] . "%'";
	  
	   for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR product_gender like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $connect->query($query);
                      
     if(mysqli_num_rows($result) > 0) {
        While($row = $result->fetch_assoc()) { 
			$output .= '
			<div class="col-lg-3 col-md-4 col-6">
			<div class="d-block mb-4 h-100">
			<a href="#" >
			 <img class="img-fluid img-thumbnail" src="images/'.$row['product_image'].'" alt="">
			 '.$row['product_name'].'</a>
	 <br />			 
			 <a href="cartAction.php?action=addToCart&id='. $row['product_id'].'" class="btn btn-primary">Add to Cart</a>
		
			 </div>
			 </div>
			';	
        }
 
    }
    else {
        $output = '<h3>No Data Found</h3>';
    }
	
	echo $output;
}
?>

  </div>

</div>

<div class="row mb-5"></div>
    <?php include('footer.php'); ?>
	
	</body>
</html>