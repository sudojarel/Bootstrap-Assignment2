<?php 

//index.php

include('database_connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>
    <!--<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
	-->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="css/fectch_data.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/main.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light flex-row">
	<!-- Search form -->
        <a class="navbar-brand mr-auto mx-auto" href="/">
            <!-- <img src="images/exampleLogo.png" class="img-fluid logo" alt="Logo"> -->
			<img src="images/logo2.jpg" class="img-fluid logo" alt="Logo">
        </a>
        <ul class="navbar-nav flex-row mr-lg-0">
            <li class="nav-item">
                 <a class="nav-link pr-2" data-toggle="modal" data-target="#myModal"><i class="fa fa-search fa-lg"></i></a>
            </li>
			<!-- Search Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  </div>
                  <div class="modal-body">

                    <h1>Search</h1>
                    <form class="navbar-form " role="search">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
			<!--
            <li class="nav-item">
                <a class="nav-link pr-2"><i class="fa fa-facebook"></i></a>
            </li>
			-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-3 mr-lg-0" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i><span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">                    
					<?php 
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
						echo "<a class='dropdown-item'>".$_SESSION['username']."</a>";?>
						<a class="dropdown-item" href = "#">Manage Profile</a>
						<a class="dropdown-item" href = "logout.php">Logout</a>
					<?php	
					}
					else{						
					?>
					<a class="dropdown-item" data-toggle="modal" data-target="#LogInModal">Login</a>
					<a class="dropdown-item" data-toggle="modal" data-target="#RegistrationModal">Register</a>
					<?php } ?>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler ml-lg-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-auto">
			<li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">For Him</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Inbox</a>
                    <a href="#" class="dropdown-item">Drafts</a>
                    <a href="#" class="dropdown-item">Sent Items</a>
                    <div class="dropdown-divider"></div>
                    <a href="#"class="dropdown-item">Trash</a>
                </div>
            </li>
			<li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">For Her</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Inbox</a>
                    <a href="#" class="dropdown-item">Drafts</a>
                    <a href="#" class="dropdown-item">Sent Items</a>
                    <div class="dropdown-divider"></div>
                    <a href="#"class="dropdown-item">Trash</a>
                </div>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="//codeply.com/go/cxXqBnGrPx">Codeply</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
			<!--
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
			-->
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
         <br />
         <br />
            <!-- <div class="col-6 col-md-4 mr-auto"> -->  
<div class="col-md-3">			
    <div class="list-group">
    			<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">0 - 500</p>
                    <div id="price_range"></div>
					<input type="range" class="custom-range" id="customRange1" min="0" max="500">
					
                </div>				
                <div class="list-group">
     <h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     <?php

                    $query = "SELECT DISTINCT(product_brand) FROM PRODUCT ORDER BY product_id DESC;";
                    //$statement = $connect->prepare($query);
                    //$statement->execute();
                    //$result = $statement->fetchAll();
					$result = mysqli_query($connect, $query);  
					while($row = $result->fetch_assoc()){
						           ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"  > <?php echo $row['product_brand']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

    <div class="list-group">
     <h3>Product Type</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(product_type) FROM PRODUCT ORDER BY product_type DESC
                    ";
                    //$statement = $connect->prepare($query);
                    //$statement->execute();
                    $result = mysqli_query($connect, $query);  
                    while($row = $result->fetch_assoc())
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector producttype" value="<?php echo $row['product_type']; ?>" > <?php echo $row['product_type']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
    
    <div class="list-group">
     <h3>Gender</h3>
     <?php
                    $query = "
                    SELECT DISTINCT(product_gender) FROM PRODUCT ORDER BY product_gender DESC
                    ";
                    //$statement = $connect->prepare($query);
                    //$statement->execute();
                    $result = mysqli_query($connect, $query);  
                    while($row = $result->fetch_assoc())
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector gender" value="<?php echo $row['product_gender']; ?>"  > <?php echo $row['product_gender']; ?></label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
            </div>

            <div class="col-md-9">
             <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var producttype = get_filter('producttype');
        var gender = get_filter('gender');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, producttype:producttype, gender:gender},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('.customRange1').slider({
        range:true,
        min:0,
        max:500,
        values:[0, 500],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
