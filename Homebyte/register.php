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
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
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

      <?php
// register.php

// Start the session to access the stored username

// Check if the user is logged in (based on PHP session)
$isLoggedIn = isset($_SESSION['username']);
?>

<!-- Now you can use $isLoggedIn in the HTML code -->
<!-- For example, you can use it in a conditional statement to show/hide certain elements -->
<?php if ($isLoggedIn) { ?>
    <!-- HTML code for elements visible to logged-in users -->
<?php } else { ?>
    <!-- HTML code for elements visible to non-logged-in users -->
        <!-- Add the login form or a link to the login page here -->
<?php } ?>


      <!-- header -->
      <?php include 'H_F/header.php'; ?>

      <!-- end header -->
    <form method="post" action="PHP/register.php" id="request" class="main_form">

      <div class="Register-cont">
        <div class="register-form">
          <h3>Name:</h3>
          <input type="text" name="username" placeholder="Full Name">
          <h3>Email:</h3>
          <input type="text" name="email" placeholder="123@example.com">
          <h3>Phone Number:</h3>
          <input type="text" name="mobile" placeholder="01*********">
          <h3>Password:</h3>
          <div class="password-container">
            <input type="password" name="password" placeholder="Password">
            <i class="password-toggle fa fa-eye" aria-hidden="true"></i>
          </div>
          <button class="register-btn" type="submit">Register</button>
        </div>
      </div>
    </form>
      


     <br>
      <!--  footer -->
      <?php include 'H_F/footer.php'; ?>


   </body>
</html>