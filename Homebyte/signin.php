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
      <?php include 'H_F/header.php'; ?>

      <!-- end header-->

      <br>

      <div class="login-container">
      <h1 class="revh1" >signin first to proceed with your order!</h1>


  <div class="login-form">
    <form action="PHP/login.php" method="POST">
      <h3>Username:</h3>
      <input type="text" name="username" placeholder="Email or Phone">
      <h3>Password:</h3>
      <div class="password-container">
          <input type="password" name="password" placeholder="Password">
      </div>

      <?php
// Check if an error parameter is present in the URL
$error = isset($_GET['error']) ? $_GET['error'] : 0;
?>

<!-- Display an error message if authentication failed -->
<?php if ($error == 1) { ?>
    <p class="error-message">The username or password is not correct.</p>
<?php } ?>


      <button type="submit" class="login-btn">Login</button>
    </form>
  </div>
  <p>Not a user? <a href="Register.php">Register now</a></p>
</div>
      
      <!--  footer -->
      <?php include 'H_F/footer.php'; ?>


   </body>
</html>