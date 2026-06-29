<?php
// Include the database config file
require_once 'dbconfig.php';
 
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

// Loop through each product and generate the product box
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imagePath = 'PHP/uploads/' . $row['screenshot'];
        if (file_exists($imagePath) && is_readable($imagePath)) {    echo '<div class="product-box">';
    echo '<img src="PHP/uploads/' . $row['screenshot'] . '" alt="" class="product-img">';
    echo '</div>';
} else {
    echo '<p>Error: Image not found or cannot be displayed.</p>';
}
}
} else {
echo '<p>No reviews available.</p>';
}


// Close the database connection
$conn->close();
?>
