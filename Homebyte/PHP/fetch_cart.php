<?php

require_once 'dbconfig.php'; 
session_start();

// Check if the user is logged in, and set the userID accordingly
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = 99999999; // Set userID to 99999999 for non-logged-in users
    // You can also add a redirect to the login page here if needed
}

$cart_items = array();

// Fetch cart items from the database
$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_cart) > 0) {
    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
        // Assuming you have a products table with image paths
        $product_query = mysqli_query($conn, "SELECT image FROM `products` WHERE name = '{$fetch_cart['name']}'");
        $product_image = mysqli_fetch_assoc($product_query)['image'];
        
        $fetch_cart['image'] = $product_image; // Just store the image filename
        $cart_items[] = $fetch_cart; 
    }
}

// Set the appropriate content type for JSON response
header('Content-Type: application/json');

// Send JSON-encoded cart items to the client
echo json_encode($cart_items);

?>
