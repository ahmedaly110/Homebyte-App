<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);

if ($isLoggedIn) {
    // User is logged in, redirect to checkout page with user details
    // Save product data into session
    $_SESSION['productID'] = $_POST['productID'];
    $_SESSION['productName'] = $_POST['productName'];
    $_SESSION['price'] = $_POST['price'];
    header("Location: ../checkout.php");
} else {
    // User is not logged in, redirect to sign-in page
    header("Location: ../signin.php");
}
?>


