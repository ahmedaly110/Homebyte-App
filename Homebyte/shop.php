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


      <!-- Products section -->
      <br>
      <!-- shop -->
      <section class="shop container">
   <!-- Category Filter -->
   <div class="category-filter">
      <label for="category-select">Select Category:</label>
      <form method="get" action="">
         <select id="category-select" name="category">
            <option value="all">All Categories</option>
            <option value="Villa">Villa</option>
            <option value="Twin House">Twin House</option>
            <option value="Townhouse">Townhouse</option>
            <option value="Penthouse">Penthouse</option>            
            <option value="iVilla">iVilla</option>
            <option value="Duplex">Duplex</option>
            <option value="Chalet">Chalet</option>
            <option value="Apartment">Apartment</option>
            <!-- Add more category options as needed -->
         </select>
         <button type="submit">Filter</button>
      </form>
   </div>
</br>

   <!-- Products Container -->
   <div class="shop-content" id="products-container">
      <?php include 'PHP/products.php'; ?>
   </div>
</section>

 
      
      <!--  footer -->
      <?php include 'H_F/footer.php'; ?>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->

      <!-- js and jQuery library -->

      
   </body>
</html>