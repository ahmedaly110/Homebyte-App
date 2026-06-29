<?php session_start();?>
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
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <div class="header">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class=" col-md-2 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img src="images/home_logo.jpg" alt="#"/></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item ">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.php">About</a>
                              </li>
                              <li class="nav-item ">
                                 <a class="nav-link" href="shop.php">shop</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.php">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-md-2">
<!-- Check if the user is logged in (based on PHP session) -->
<?php
$isLoggedIn = isset($_SESSION['username']);
?>

<ul class="email text_align_right">
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
        </li>
    <?php } ?>   

</form>

         </div>
      </header>
      <!-- end header-->