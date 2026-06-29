<?php
// Include the database config file
require_once 'dbconfig.php'; 

if (isset($_POST['submit'])) {
    // Get form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category = $_POST['category']; // New line to get the selected category
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Insert data into the database, including the category
    $sql = "INSERT INTO products (name, price, category, image) VALUES ('$product_name', '$product_price', '$category', '$image_name')";
    if ($conn->query($sql) === TRUE) {
        // Upload the image to a directory on the server
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image_name);
        move_uploaded_file($image_tmp, $target_file);

        // Redirect to admineditproducts.php
        header("Location: ../admineditproducts.php");
        exit(); // Make sure to exit after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
