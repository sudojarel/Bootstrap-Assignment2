 <?php   
session_start();
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
  <script src="javascript/main.js"></script>
  <script src="javascript/validation.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" href="css/validation.css">
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
			<!-- Modal -->
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
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
	<li data-target="#carousel-example-2" data-slide-to="3"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active" max-height="800px">
      <div class="view">
        <img class="d-block w-100" src="images/img1slider.jpg" alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">This is the first title</h3>
        <p>First text</p>
      </div>	
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/img2slider.jpg" alt="Second slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Thir is the second title</h3>
        <p>Secondary text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/img3slider.jpg" alt="Third slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">This is the third title</h3>
        <p>Third text</p>
      </div>
    </div>
	 <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/img4slider.jpg" alt="Fourth slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">This is the fourth title</h3>
        <p>Fourth text</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<div class="container-fluid">


<!--
    <div class="jumbotron">
	
        <h1>Learn to Create Websites</h1>
        <p class="lead">In today's world internet is the most popular way of connecting with the people. At <a href="https://www.tutorialrepublic.com" target="_blank">tutorialrepublic.com</a> you will learn the essential web development technologies along with real life practice examples, so that you can create your own website to connect with the people around the world.</p>
        <p><a href="https://www.tutorialrepublic.com" target="_blank" class="btn btn-success btn-lg">Get started today</a></p>
    </div>
-->
<div class="row mt-5"></div>
    <div class="row">
		<div class="col-sm-6">
		<img src="images/male-left.jpg" class="img-fluid" alt="Logo" >
		<div class="male-left-text">
    <h1 style="font-size:3vw">For him</h1>
    <p style = "font-size:2vw"><a href="#">Shop now </a></p>
	</div>
		</div>
		<div class="col-sm-6">
		<img src="images/female-right.jpg" class="img-fluid" alt="Logo">
		<div class="male-left-text">
    <h1 style="font-size:3vw">For her</h1>
    <p style = "font-size:2vw"><a href="#">Shop now </a></p>
	</div>
		</div>
    </div>
<div class="row mb-5"></div>
<div class="row mb-2"></div>
 <div class="row" id = "ad-banner">
    <div class="col-md-4" id="icons">
	<i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i>
	<br>
	We ship worldwide
	</div>
	
    <div class="col-md-4" id="icons">
	<i class="fa fa-lock fa-lg" aria-hidden="true"></i>
	<br>
	Fast and secure payment
	</div>
    
	<div class="col-md-4" id="icons">
	<i class="fa fa-mobile fa-lg" aria-hidden="true"></i><br>
	Call us for styling advice on <br>
	+65 9222 0999
	</div>
  </div>
  <div class="row mb-5"></div>
 <div class="container">
    <header class="text-center">
        <h1>Popular picks</h1>
        </header>
	<div class="row">
	  <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
		   <div class="row h-50">
				  <div class="col-md-12 col-sm-12 co-xs-12 gal-item">
							<div class="box">
							<a href="http://fakeimg.pl/758x370/" data-toggle="lightbox">
						 <img src="http://fakeimg.pl/758x370/" class="img-ht img-fluid rounded">
						 </a>
							</div>
					</div>
			</div>
	  
	    <div class="row h-50">
				 <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
				  <div class="box">
					<img src="http://fakeimg.pl/748x177/" class="img-ht img-fluid rounded">
				</div>
				</div>

				<div class="col-md-6 col-sm-6 co-xs-12 gal-item">
				 <div class="box">
					<img src="http://fakeimg.pl/371x370/" class="img-ht img-fluid rounded">
				</div>
				</div>
            </div>
      </div>

           <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
			   <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-25">
				<div class="box">
					<img src="http://fakeimg.pl/748x177/" class="img-ht img-fluid rounded">
				</div>
				</div>

				  <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-75">
				   <div class="box">
					<img src="http://fakeimg.pl/748x177/" class="img-ht img-fluid rounded">
				</div>
				</div>
            </div>

	</div>
</div>
<div class="row mb-5"></div>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2019 Tutorial Republic</p>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div>
        </div>
    </footer>

</div>

</body>
</html>