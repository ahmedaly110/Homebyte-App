<?php
// Database connection
require_once 'dbconfig.php';


// Query to fetch images and corresponding titles/paragraphs from the database
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <style>
        /* Your existing styles */

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            padding: 20px;
        }

        .grid-item {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .grid-item h3 {
            font-size: 18px;
            margin: 0 0 10px;
        }

        .grid-item p {
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
    <h2>live reviews:</h2>
    <div class="grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagePath = 'PHP/uploads/' . $row['screenshot'];
                if (file_exists($imagePath) && is_readable($imagePath)) {
                    echo '<div class="grid-item">';
                    echo '<div class="image-container"><img src="' . $imagePath . '" alt="Product Image"></div>';

                    // Add delete link with confirmation prompt
                    echo '<a class="delete-icon" href="PHP/delete_review.php?delete_id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this review?\')">Delete</a>';

                    echo '</div>';
                } else {
                    echo '<p>Error: Image not found or cannot be displayed.</p>';
                }
            }
        } else {
            echo '<p>No reviews available.</p>';
        }
        ?>
    </div>
</body>
</html>
