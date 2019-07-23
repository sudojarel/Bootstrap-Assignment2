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
<!-- ------- REGISTRATION ------- -->
<div class="modal fade" id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <form action = "register.php" method="post" id="insert_form" name = "insert_form">
                    <!-- Form Title -->
                    <div class="form-heading text-center">
                        <div class="title">Registration</div>
                        <p class="title-description">Already have an account? <a href="#" data-toggle="modal" data-target="#LogInModal" data-dismiss="modal"><span style="color:blue">Sign in.</span></a></p>
                    </div>
					
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="First Name" name = "fname" id = "fname" required /> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Last Name" name = "lname" id = "lname" required /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="Username" id="username" name = "username"  required /> 
                        </div>
                        <div class="col-md-6">
                            <input type="email" placeholder="Email Address" id="email" name = "email" required /> 

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" placeholder="Password" id="pw" name = "pw" required /> 
                        </div>
                        <div class="col-md-6">
                            <input type="password" placeholder="Re-password" required /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-md btn-danger" id="reg_btn">Create Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------- REGISTRATION Ends ------- -->
<!-- ------- LOGIN ------- -->
<div class="modal fade" id="LogInModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <form action = "login.php" method="post" id="login_form">
                    <!-- Form Title -->
                    <div class="form-heading text-center">
                        <div class="title">Sign In</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" placeholder="Username" name = "username" id = "username" required /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="password" placeholder="Password" name = "password" id = "password" required /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" />
                            <label>Remember Me</label>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <label><a href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Forget Password?</a></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-md btn-danger">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------- LOGIN Ends ------- -->