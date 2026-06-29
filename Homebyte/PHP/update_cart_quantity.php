<?php
require_once 'dbconfig.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true); // Decode JSON data
    
    if (isset($requestData['id'], $requestData['quantity'])) {
        $id = mysqli_real_escape_string($conn, $requestData['id']);
        $newQuantity = mysqli_real_escape_string($conn, $requestData['quantity']);
        $userId = $_SESSION['user_id'];

        $updateQuery = "UPDATE cart SET quantity = '$newQuantity'
                        WHERE user_id = '$userId' AND id = '$id'";

        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
}
