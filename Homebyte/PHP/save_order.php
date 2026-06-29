<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the user is logged in
    if (!isset($_SESSION["user_id"])) {
        // Redirect to the login page or handle unauthorized access as needed
        header("Location: ../login.php");
        exit;
    }
 
    // Connect to your database
    require_once 'dbconfig.php';

    // Get user data from the session
    $userID = $_SESSION["user_id"];
    $orderDate = date("Y-m-d H:i:s"); // Current date and time
    $paymentMethod = $_POST["payment_method"];

    // Insert order data into the "orders" table
    $sql = "INSERT INTO orders (userID, order_date) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $userID, $orderDate);

    if ($stmt->execute()) {
        $orderID = $stmt->insert_id; // Get the generated order ID

        // Retrieve items from the user's cart in the database based on their userID
        $cartQuery = "SELECT id, quantity FROM cart WHERE user_id = ?";
        $cartStmt = $conn->prepare($cartQuery);
        $cartStmt->bind_param("s", $userID);
        $cartStmt->execute();
        $cartResult = $cartStmt->get_result();

        while ($cartRow = $cartResult->fetch_assoc()) {
            $productID = $cartRow["id"];
            $quantity = $cartRow["quantity"];

            // Insert the cart items into the "order_details" table
            $orderDetailsSql = "INSERT INTO order_details (orderID, productID, quantity) VALUES (?, ?, ?)";
            $orderDetailsStmt = $conn->prepare($orderDetailsSql);
            $orderDetailsStmt->bind_param("iii", $orderID, $productID, $quantity);
            $orderDetailsStmt->execute();
        }

        // Clear the user's cart in the database
        $clearCartSql = "DELETE FROM cart WHERE user_id = ?";
        $clearCartStmt = $conn->prepare($clearCartSql);
        $clearCartStmt->bind_param("s", $userID);
        $clearCartStmt->execute();

        // Close statements and the database connection
        $stmt->close();
        $cartStmt->close();
        $orderDetailsStmt->close();
        $clearCartStmt->close();
        $conn->close();

        // Redirect based on the payment method
    }}

?>
