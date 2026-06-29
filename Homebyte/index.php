<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home Byte</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      
   </head>
   <!-- body -->

   <body class="home">
   <?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->


      <!-- header -->
      <header>


         <div class="menu_sitbar di_mr01">

            <div class="logoslogan"><a href="index.php"><img src="images/home_logo.jpg " alt="#"/>
            </a>
            </div>



            <nav class="navigation navbar navbar-expand-md navbar-dark ">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               
               <div class="collapse navbar-collapse" id="navbarsExample05"> ٍ
                  <ul class="navbar-nav mr-auto">
                     
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="shop.php">shop</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
         <div class="header_full_banne">
            <div class="header">
               <div class="container-fluid">
                  <div class="row d_flex">
                     <div class=" col-md-2 col-sm-3 col logo_section di_mr0">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logo">
                                 <a href="index.php"><img src="images/home_logo.jpg" alt="#"/>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  <div class="col-md-8 col-sm-9 di_mr0">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.php">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="shop.php">shop</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.php">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                     
                  </div>
               <div class=" col-md-8 d_none">
            </div>
         <div class="col-md-4">
         
         <!-- Check if the user is logged in (based on PHP session) -->
        <ul class="email text_align_right">
        <li class="slogan"><h4 style="color: #A88158;">Turning Houses into Homes.</h4></li>
        <?php if ($isLoggedIn) { ?>
            <!-- Show the profile dropdown only when the user is logged in -->
            <li class="popup">
                <a href="javascript:myFunction();">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <span class="popuptext" id="myPopup">
                    <div class="col-md-10 offset-md-1 ">
                        <div class="login-form">
                            <!-- You can add the user's name and other profile information here -->
                            <h4>Welcome, <?php echo $_SESSION['name']; ?></h4>
                            <ul>
                                <li><a href="profile_settings.php">Profile Settings</a></li>
                                <!-- Add other profile options here -->
                                <li><a href="PHP/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </span>
            </li>
<?php } else { ?>
            <!-- Show the login button when the user is not logged in -->
            <li class="popup">
                <a href="javascript:myFunction();">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <span class="popuptext" id="myPopup">
                    <div class="col-md-10 offset-md-1 ">
                        <div class="login-form">
                            <form action="PHP/login.php" method="POST">
                                <h3>username:</h3>
                                <input type="text" name="username" placeholder="Email or Phone">
                                <h3>Password:</h3>
                                <div class="password-container">
                                    <input type="password" name="password" placeholder="Password">
                                    <i class="password-toggle fa fa-eye" aria-hidden="true"></i>
                                </div>
                                <button type="submit" class="login-btn">Login</button>
                            </form>
                        </div>
                        <p>not a user? <a href="Register.php">Register now</a></p>
                    </div>
                </span>
            </li><?php } ?>

      
                     </ul>
                  </div>
               </div>
              </div>
            </div>
        
         <!-- cart -->
            
            <!-- end header inner -->
            <!-- end header -->
            <!-- top -->
            <div class="full_bg">
        <div class="slider_main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                           <!-- carousel code -->
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
<?php include('PHP/display_banner.php'); ?>
                            </div>


                              <!-- controls -->
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                              <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                              <span class="sr-only">Next</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!-- end banner -->
      <!-- about -->
      <div class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="titlepage text_align_left">
                     <h2>Our Story</h2>
                     <p>This real estate platform was developed as a graduation project at the Faculty of Computers and Information Sciences, Ain Shams University, aiming to provide a modern, user-friendly solution for browsing, listing, and managing properties.
                     </p>
                     <a class="read_more" href="about.php">Read More</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img text_align_center">
                     <figure><img class="img_responsive" src="images/about.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- contact -->
      <div class="contact">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>Contact Us</h2>
                  </div>
               </div>
               <div class="col-md-10 offset-md-1 ">
                  <form method="post" action="PHP/send.php" id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-6 ">
                           <input class="contactus" placeholder="Full Name" type="text" name=" Name"> 
                        </div>
                        <div class="col-md-6">
                           <input class="contactus" placeholder="Email" type="text" name="Email">                          
                        </div>
                        <div class="col-md-6">
                           <input class="contactus" placeholder="Phone Number" type="text" name="Phone">                          
                        </div>
                        <div class="col-md-6">
                           <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn" type="submit" name="btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- contact -->
    
    <!-- end quality -->
      <!--  footer -->
      <?php include 'H_F/footer.php'; ?>

       

   </body>
</html>
