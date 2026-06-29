<?php
session_start(); // Start the session to access session variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['mobile'];
    $password = $_POST['password'];


    // Include the database config file
    require_once 'dbconfig.php';

    // Hash the password with bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into 'customers' table
    $stmt = $conn->prepare("INSERT INTO customers (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $phone, $hashedPassword);
    $stmt->execute();

    // redirect to another page
    header("Location: ../signin.php");
    exit();

    // Get the auto-incremented user ID after inserting into 'customers' table
    $userID = $conn->insert_id;


    $conn->close();
}
?>
