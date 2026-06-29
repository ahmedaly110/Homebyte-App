<?php
// Database connection
require_once 'dbconfig.php';




// Query to fetch images and corresponding titles/paragraphs from the database
$sql = "SELECT productID, name, price, image FROM products";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            padding: 20px;
        }

        .gallery-item {
            right:10px
            border: 1px solid #ddd;
            padding: 10px;
        }

        .gallery-item h3 {
            font-size: 18px;
            margin: 0 0 10px;
        }

        .gallery-item p {
            margin: 0;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }
        .delete-icon {
            display: inline-block;
            cursor: pointer;
            color: red;
            font-weight: bold;
        }
        .delete-form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Available products:
    <div class="gallery">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = 'PHP/uploads/' . $row['image'];
            if (file_exists($imagePath) && is_readable($imagePath)) {
                echo '<div class="gallery-item">';
                echo '<h1>id:' . $row['productID'] . '</h1>';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['price'] . '</p>';
                echo '<div class="image-container"><img src="' . $imagePath . '" alt="Uploaded Photo"></div>';
                
                // Add delete link with confirmation prompt
                echo '<a class="delete-icon" href="PHP/delete_product.php?delete_id=' . $row['productID'] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>';
                
                echo '</div>';
            } else {
                echo '<p>Error: Image not found or cannot be displayed.</p>';
            }
        }
    } else {
        echo '<p>No photos uploaded yet.</p>';
    }
    ?>
    </div>
    </h2>
</body>
</html>