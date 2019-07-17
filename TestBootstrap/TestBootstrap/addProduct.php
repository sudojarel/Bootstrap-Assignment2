<?php  
//index.php
include('database_connect.php');
$query = "SELECT * FROM PRODUCT ORDER BY product_id DESC";
$result = mysqli_query($connect, $query);
 ?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial | Bootstrap Modal with Dynamic MySQL Data using Ajax & PHP</title>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/main.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
 </head>  
 <body>  <nav class="navbar navbar-expand-md navbar-light flex-row">
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
  <br /><br />  
  <div class="container" style="width:700px;">  
   <h3 align="center">Insert Data Through Bootstrap Modal by using Ajax PHP</h3>  
   <br />  
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
    </div>
    <br />
    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="70%">Product Name</th>  
       <th width="30%">View</th>
      </tr>
      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
       <td><?php echo $row["product_name"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["product_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">PHP Ajax Insert Data in MySQL By Using Bootstrap Modal</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form" enctype="multipart/form-data">
     <label>Enter Product Name</label>
     <input type="text" name="pname" id="pname" class="form-control" />
     <br />
     <label>Enter Product Description</label>
     <textarea name="desc" id="desc" class="form-control"></textarea>
     <br />
     <label>Select Gender</label>
     <select name="gender" id="gender" class="form-control">
      <option value="Male">Male</option>  
      <option value="Female">Female</option>
     </select>
     <br />  
     <label>Enter Product Type</label>
     <input type="text" name="type" id="type" class="form-control" />
     <br />
	 <label>Enter Product Brand</label>
     <input type="text" name="brand" id="brand" class="form-control" />
     <br />
     <label>Enter Price</label>
     <input type="text" name="price" id="price" class="form-control" />
     <br />
	 <label>Upload Image</label>
     <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" />
     <br />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#pname').val() == "")  
  {  
   alert("Product Name is required");  
  }  
  else if($('#desc').val() == '')  
  {  
   alert("Description is required");  
  }  
  else if($('#type').val() == '')
  {  
   alert("Product Type is required");  
  }
  else if($('#brand').val() == '')
  {  
   alert("Product Brand is required");  
  }
   else if($('#price').val() == '')
  {  
   alert("Product Price is required");  
  }
   
  else  
  {  
  var formData = new FormData($(this)[0]);
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:formData,  
	contentType: false,
	cache: false,
	processData:false,
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });



 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>
