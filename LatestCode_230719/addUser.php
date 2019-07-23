<?php  
//index.php
session_start();
include('database_connect.php');
$query = "SELECT * FROM USER ORDER BY userID DESC";
$result = mysqli_query($connect, $query);
include_once 'Cart.class.php'; 
$cart = new Cart; 
 ?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>System Admin - Add User</title>  
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
        <a class="navbar-brand mr-auto mx-auto" href="index2.php">
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
                    <form class="navbar-form " role="search" action="searchResult.php" method = "post">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name = "search">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
			<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-3 mr-lg-0" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></span>
                </a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			<a class="dropdown-item" href = "#"><div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
    </div></a>
				
				</div>
                
            </li>
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
                    <a class="nav-link" href="viewProduct.php">Browse Products</a>
                </li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'SYS') { ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
					<div class="dropdown-menu">
                    <a href="addUser.php" class="dropdown-item">Add Users</a>
                    <a href="addProduct.php" class="dropdown-item">Add Products</a>
					</div>
                </li>
			<?php } ?>
               
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

  <?php 
  if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'SYS') {
	 ?>

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
       <td><?php echo $row["username"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["userID"]; ?>" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div> 
  <?php
  }
  else{ ?>
	   <h2 style = "text-align:center">You are not authorized to view this page</h2>
  <?php
  }
  ?>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">PHP Ajax Insert Data in MySQL By Using Bootstrap Modal</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Username</label>
     <input type="text" name="uname" id="uname" class="form-control" />
     <br />
     <label>Enter First Name</label>
     <input type="text" name="fname" id="fname" class="form-control" />
     <br />
     <label>Enter Last Name</label>
     <input type="text" name="lname" id="lname" class="form-control" />
     <br />
     <label>Select Role</label>
     <select name="role" id="role" class="form-control">
      <option value="SYS">System Admin</option>  
      <option value="USR">Customer</option>
     </select>
     <br />  
     <label>Enter Email Address</label>
     <input type="email" name="email" id="email" class="form-control" />
     <br />
   <label>Enter Password</label>
     <input type="password" name="password" id="password" class="form-control" />
     <br />
     <label>Re-Enter Password</label>
     <input type="password" name="password2" id="password2" class="form-control" />
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
  if($('#uname').val() == "")  
  {  
   alert("User Name is required");  
  }  
  else if($('#fname').val() == '')  
  {  
   alert("First Name is required");  
  }  
  else if($('#lname').val() == '')
  {  
   alert("Last Name is required");  
  }
  else if($('#email').val() == '')
  {  
   alert("Email is required");  
  }
   else if($('#password').val() != $('#password2').val())
  {  
   alert("Please ensure you have re-entered the correct password!");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insertuser.php",  
    method:"POST",  
    data: new FormData(this),
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
 </body>  
</html>  


