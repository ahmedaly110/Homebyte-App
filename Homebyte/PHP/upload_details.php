<?php
// Include the database config file
require_once 'dbconfig.php';

if (isset($_POST['submit'])) {
    // Get form data
    $product_id = $_POST['product_id'];
    $description = $_POST['description'];
   
    // Upload and insert images into the database
    $image_names = array(); // Create an array to store image names

    for ($i = 1; $i <= 4; $i++) {
        $input_name = "image" . $i;
        $image_name = $_FILES[$input_name]['name'];
        $image_tmp = $_FILES[$input_name]['tmp_name'];

        // Generate a unique filename (you can improve this logic)
        $unique_filename = uniqid() . "_" . $image_name;

        $target_dir = "uploads/";
        $target_file = $target_dir . $unique_filename;

        if (move_uploaded_file($image_tmp, $target_file)) {
            // Image uploaded successfully, store the filename in the array
            $image_names[] = $unique_filename;
        } else {
            echo "Error uploading $input_name";
            // Handle the error (e.g., don't insert into the database)
        }
    }

    // Insert data into the database, including the category
    $sql = "INSERT INTO prod_details (productID, img1, img2, img3, img4, description) 
            VALUES ('$product_id', '$image_names[0]', '$image_names[1]', '$image_names[2]', '$image_names[3]', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to admineditproducts.php
        header("Location: ../admineditdetails.php");
        exit(); // Make sure to exit after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
