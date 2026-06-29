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
      <!-- header -->
      <?php include 'H_F/header.php'; ?>

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
      <br>
      <!-- contact -->  
      <!--  footer -->
      <?php include 'H_F/footer.php'; ?>

      <!-- end footer -->

   </body>
</html>