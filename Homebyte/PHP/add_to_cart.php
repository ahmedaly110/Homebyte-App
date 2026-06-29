<?php
// Include your database connection code here
require_once 'dbconfig.php';

session_start();

// Function to generate a temporary user ID if not logged in
function generateTempUserID() {
    return 'temp_' . uniqid(); // Generate a unique temporary user ID
}

// Check if the user is logged in
if (isset($_SESSION['userID'])) {
    $userId = $_SESSION['userID']; // Get the user's actual user ID
} else {
    // User is not logged in, set userId to 99999999
    $userId = 99999999;
}




// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    // Retrieve product details from form data
    $productId = $_POST['product_productID'];
    $productName =  $_POST['product_Name'];
    $productPrice = $_POST['product_Price'];
    $productImage =  $_POST['product_image'];
    $productQuantity = $_POST['product_quantity'];

    // Check if the product is already in the cart
    $checkQuery = "SELECT id FROM cart WHERE userID = '$userId' AND productID = '$productId'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Update the quantity of the existing product in the cart
        $updateQuery = "UPDATE cart SET quantity = quantity + '$productQuantity'
                        WHERE userID = '$userId' AND productID = '$productId'";
        if (mysqli_query($conn, $updateQuery)) {
            header("Location: ../shop.php");
            exit(); 
        } else {
            $message = 'Error updating product quantity in cart: ' . mysqli_error($conn);
        }
    } else {

        // Insert the product into the cart table
        $insertQuery = "INSERT INTO cart (userID, productID, Name, Price, image, quantity)
        VALUES ('$userId', '$productId', '$productName', '$productPrice', '$productImage', '$productQuantity')";

    
        if (mysqli_query($conn, $insertQuery)) {
            // Product added to cart successfully
            header("Location: ../shop.php");
            exit(); 
        } 
    }
}
?>
