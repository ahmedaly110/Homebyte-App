<?php
// Database connection
require_once 'dbconfig.php'; 


// Handle delete request
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteSql = "DELETE FROM ann_banner WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
        // Delete successful, redirect back to admineditbanners.php
        header("Location: ../admineditbanner.php");
        exit;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
