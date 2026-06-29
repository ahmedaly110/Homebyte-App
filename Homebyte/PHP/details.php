<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id'])) {
    die("Product ID not provided.");
}

$productId = $_GET['id'];

require_once 'dbconfig.php';

$stmt1 = $conn->prepare("SELECT * FROM prod_details WHERE productID = ?");
$stmt1->bind_param("i", $productId);
$stmt1->execute();
$result1 = $stmt1->get_result();
$productDetails1 = $result1->fetch_assoc();

$stmt2 = $conn->prepare("SELECT * FROM products WHERE productID = ?");
$stmt2->bind_param("i", $productId);
$stmt2->execute();
$result2 = $stmt2->get_result();
$productDetails2 = $result2->fetch_assoc();

if (!$productDetails1 || !$productDetails2) {
    die("Product not found.");
}
?>

<div class="row row-sm">
    <!-- LEFT SIDE (IMAGES) -->
    <div class="col-md-6 _boxzoom">
        <div class="zoom-thumb">
            <ul class="piclist">
                <li><img src="<?php echo 'PHP/uploads/' . $productDetails1['img1']; ?>" alt=""></li>
                <li><img src="<?php echo 'PHP/uploads/' . $productDetails1['img2']; ?>" alt=""></li>
                <li><img src="<?php echo 'PHP/uploads/' . $productDetails1['img3']; ?>" alt=""></li>
                <li><img src="<?php echo 'PHP/uploads/' . $productDetails1['img4']; ?>" alt=""></li>
            </ul>
        </div>

        <div class="_product-images">
            <div class="picZoomer">
                <img class="my_img" src="<?php echo 'PHP/uploads/' . $productDetails1['img1']; ?>" alt="">
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE (DETAILS) -->
    <div class="col-md-6">
        <div class="_product-detail-content">

            <!-- PRODUCT Name -->
            <p class="_p-Name"><?php echo $productDetails2['Name']; ?></p>

            <!-- Price -->
            <div class="_p-Price-box">
                <div class="p-list">
                    <span class="Price">£ <?php echo $productDetails2['Price']; ?></span>
                </div>


                <!-- DESCRIPTION -->
                <div class="_p-features">
                    <span>Description About this product:</span>
                    <p><?php echo $productDetails1['description']; ?></p>
                </div>

                <!-- ADD TO CART FORM -->
                <form method="post" action="PHP/check_login.php">
                <input type="hidden" name="productID" value="' . $row['productID'] . '">
                <input type="hidden" name="productName" value="' . $row['Name'] . '">
                <input type="hidden" name="price" value="' . $row['Price'] . '">
                <button type="submit" class="btn-buy">Buy Now</button>
                </form>

            </div>
        </div>
    </div>
</div>