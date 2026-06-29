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
      
      <style>



.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
}


input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

h2{
  left: 10px;
}

</style>

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

      </br>
      <h2>Submit your contact Request and you will be contacted soon</h2>
</br>
<div class="row">
  <div class="col-75">
    <div class="container">
    <form action="PHP/order_placed.php" method="post">
            
      <div class="row">
  <div class="col-50">
    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
    <input type="text" id="fname" name="name" placeholder="John M. Doe" value="<?php echo $_SESSION['name']; ?>" required>
    <label for="email"><i class="fa fa-envelope"></i> Email</label>
    <input type="text" id="email" name="email" placeholder="john@example.com" value="<?php echo $_SESSION['email']; ?>" required>
    <label for="phone"><i class="fa fa-institution"></i> Phone</label>
    <input type="text" id="phone" name="phone" placeholder="01....." value="<?php echo $_SESSION['phone']; ?>" required>
    <label for="Msg"><i class="fa fa-address-card-o"></i>Message</label>
    <input type="text" id="Msg" name="message" placeholder="" value="" required>
    <input type="hidden" name="productID" value="<?php echo $_SESSION['productID']; ?>">
    <input type="hidden" name="productName" value="<?php echo $_SESSION['productName']; ?>">
    <input type="hidden" name="price" value="<?php echo $_SESSION['price']; ?>">
    <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">

  </div>
</div>

        <input type="submit" value="Submit Contact Request" class="checkout-btn">

</br>
      </form>
    </div>



      
      <!--  footer -->
      <?php include 'H_F/footer.php'; ?>


   </body>
</html>