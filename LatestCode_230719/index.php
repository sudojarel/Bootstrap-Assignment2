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
                    <a class="dropdown-item" href="">User</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#loginModal">Login</a>
					<a class="dropdown-item" data-toggle="modal" data-target="#add_data_Modal">Register</a>
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
	<!-- Login Modal -->
<div id="loginModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Login</h4>  
                </div>  
                <div class="modal-body"> 
				<form action = "login.php" method="post" id="login_form">				
				<i class="fa fa-user-o" aria-hidden="true"></i>
                     <label>Email</label>  
                     <input type="email" name="email" id="email" class="form-control" />Your Email</label>
					 <label data-error="Invalid Email" data-success="Valid Email" for="email">Your name</label>					 
                     <br />  
					 <i class="fa fa-lock" aria-hidden="true"></i>
                     <label>Password</label>  
                     <input type="password" name="password" id="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" id="loginButton" class="btn btn-success" />
					 </form>
                </div>  
           </div>  
      </div>  
 </div>  
 <!-- end of login modal -->
 <!-- Register Modal -->
 <div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Register with Hang now!</h4>
   </div>
   <div class="modal-body">
    <form action = "register.php" method="post" id="insert_form" name = "insert_form">
	<div id="fname_div">
     <label>Enter First Name</label>
     <input type="text" name="fname" id="fname" class="form-control" />
	 <div id="fname_error"></div>
	 </div>
     <br />
     <label>Enter Last Name</label>
    <input type="text" name="lname" id="lname" class="form-control" />
     <br />
     <label>Select Gender</label>
     <select name="gender" id="gender" class="form-control">
      <option value="Male">Male</option>  
      <option value="Female">Female</option>
     </select>
     <br />  
     <label>Enter Email</label>
     <input type="text" name="email" id="email" class="form-control" />
     <br />  
	 <label>Enter Handndphone Number</label>
     <input type="number" name="hp" id="hp" class="form-control" />
     <br />  
     <label>Enter Password</label>
     <input type="password" name="pw" id="pw" class="form-control" />
     <br />
	 <label>Re-Enter Password</label>
     <input type="password" name="pw2" id="pw2" class="form-control" />
     <br />
     <input type="submit" name="insert" id="submitButton" value="Insert" class="btn btn-success" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 <!-- end of register modal -->
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