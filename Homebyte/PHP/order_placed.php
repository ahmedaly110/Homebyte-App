<?php
session_start();
require_once 'dbconfig.php';

$fullname = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$message  = $_POST['message'];

$userID     = $_SESSION['userID'];
$productID  = $_SESSION['productID'];
$productName= $_SESSION['productName'];
$price      = $_SESSION['price'];

$stmt = $conn->prepare("
    INSERT INTO orders 
    (name, email, phone, message, userID, productID, productName, total)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "ssssissd",
    $fullname,
    $email,
    $phone,
    $message,
    $userID,
    $productID,
    $productName,
    $price
);

$stmt->execute();
$stmt->close();
$conn->close();
echo"Order to be Contacted was sent succesfully!";

?>