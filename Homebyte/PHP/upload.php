<?php
//include the database config file
require_once 'dbconfig.php'; 

if (isset($_POST['submit'])) {
    // Get form data
    $banner_title = $_POST['banner_title'];
    $announcement = $_POST['announcement'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Insert data into the database
    $sql = "INSERT INTO ann_banner (title, paragraph, image) VALUES ('$banner_title', '$announcement', '$image_name')";
    if ($conn->query($sql) === TRUE) {
        // Upload the image to a directory on the server
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image_name);
        move_uploaded_file($image_tmp, $target_file);

        // Redirect to admineditbanner.php
        header("Location: ../admineditbanner.php");
        exit(); // Make sure to exit after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
