<?php
session_start(); 
require_once 'dbconfig.php'; // Include the database config file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = $_POST['firstname'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $area = $_POST['address'];
    $street = $_POST['address'];
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $apartment = $_POST['apartment'];
    $specialSign = $_POST['special_sign'];
    $paymentMethod = $_POST['payment_method'];

    // Assuming you have stored user ID in the session
    $userId = $_SESSION['user_id'];

    // Insert order details into the database
    $insertOrderQuery = "INSERT INTO orders (user_id, full_name, email, city, area, street, building, floor, apartment, special_sign, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($insertOrderQuery);
    
    // Bind parameters
    $stmt->bind_param("sssssssssss", $userId, $fullName, $email, $city, $area, $street, $building, $floor, $apartment, $specialSign, $paymentMethod);
    
    // Execute the query
    if ($stmt->execute()) {
        // Order was successfully inserted into the database
        if ($paymentMethod === "cash") {
            // Redirect to a thank you page for cash payment
            header("Location: thank_you_cash.php");
            exit();
        } elseif ($paymentMethod === "card") {
            // Redirect to a card payment page
            header("Location: card_payment.php");
            exit();
        }
    } else {
        // Handle any errors that may occur during database insertion
        echo "Error: " . $conn->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, handle it accordingly (e.g., redirect back to the checkout page)
    header("Location: checkout.php");
    exit();
}
?>
