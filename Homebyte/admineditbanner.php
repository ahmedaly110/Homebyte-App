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


      <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>


   </head>
   <!-- body -->
   <body class="home">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <div class="menu_sitbar di_mr01">

            <div class="logoslogan"><a href="index.php"><img src="images/home_logo.jpg" alt="#"/>
            </a>
            </div>

            <nav class="navigation navbar navbar-expand-md navbar-dark ">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               
               <div class="collapse navbar-collapse" id="navbarsExample05">
                  <ul class="navbar-nav mr-auto">
                     
                  <li class="nav-item active">
                        <a class="nav-link" href="admineditbanner.php">banner</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="admineditproducts.php">products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="admineditdetails.php">Product details</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="adminorders.php">orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="adminmessages.php">Messages</a>
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
                     <li class="nav-item ">
                        <a class="nav-link" href="admineditbanner.php">banner</a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="admineditproducts.php">products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="admineditdetails.php">Product details</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="adminorders.php">orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="adminmessages.php">Messages</a>
                     </li>

                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class=" col-md-8 d_none">

                     </div>
                     <div class="col-md-4">
                        <ul class="email text_align_right">
                           <li class="popup"><a href= "javascript:myFunction();"><i class="fa fa-user" aria-hidden="true"></i></a>
                              <span class="popuptext" id="myPopup">  
                                 <div class="col-md-10 offset-md-1 ">
                                    <div class="login-form">
                                       <h3>username:</h3>
                                      <input type="text" name="username" placeholder="Email or Phone">
                                      <h3>Password:</h3>
                                      <div class="password-container">
                                        <input type="password" name="password" placeholder="Password">
                                        <i class="password-toggle fa fa-eye" aria-hidden="true"></i>
                                      </div>
                                      <button class="login-btn">Login</button>
                                    </div>
                                    <p>not a user? <a href="Register.php">Register now</a></p>
                                 </div>
                                    </span>
                                 </li>         
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->

            <div class="wrapper">
        <form action="PHP/upload.php" method="post" enctype="multipart/form-data" class="login-form"> <!-- Add class "login-form" -->
            <div class="form-group">
                <label for="image">Select image file:</label>
                <input type="file" name="image" class="form-control" placeholder="Select image file"> <!-- Add class "form-control" -->
            </div>

            <div class="form-group">
                <label for="banner_title">Banner Title:</label>
                <input type="text" name="banner_title" class="form-control" placeholder="Banner Title"> <!-- Add class "form-control" -->
            </div>

            <div class="form-group">
                <label for="announcement">Announcement:</label>
                <textarea name="announcement" class="form-control" placeholder="Announcement"></textarea> <!-- Add class "form-control" -->
            </div>

            <input type="submit" name="submit" class="login-btn" value="Upload"> <!-- Add class "login-btn" -->
        </form>
    </div>
           
    <div class="gallery-wrapper">
    <?php include 'PHP/display_photos.php'; ?>
</div>


        </div>
          

                              
      <!--  footer -->
      <footer>

         <div class="copyright">
           <div class="container">
             <div class="row">
               <div class="col-md-12">
                  <p class="copyright">© 2026 T33 Level 4 CS department (Old By Law) All Rights Reserved.</p>
               </div>
             </div>
           </div>
         </div>
       </footer>
       
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/custom.js"></script>
   </body>
</html>
