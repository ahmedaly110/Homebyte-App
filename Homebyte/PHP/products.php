<?php
// Include the database config file
require_once 'dbconfig.php';

// Get the selected category from the query parameter
if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];
} else {
    $selectedCategory = 'all'; // Default to show all categories
}

// Construct the SQL query based on the selected category
if ($selectedCategory === 'all') {
    // Fetch all products
    $sql = "SELECT * FROM products";
} else {
    // Fetch products based on the selected category
    $sql = "SELECT * FROM products WHERE category = '$selectedCategory'";
}

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo '<div class="product-box">';
    echo '<a href="prod_details.php?id=' . $row['productID'] . '">'; // Add this line
    echo '<img src="PHP/uploads/' . $row['image'] . '" alt="" class="product-img">';
    echo '<h2 class="product-title">' . $row['Name'] . '</h2>';
    echo '</a>'; // Add this line
    echo '<span class="price">£ ' . $row['Price'] . '</span>';

    echo '<form method="post" action="PHP/check_login.php">';
    echo '<input type="hidden" name="productID" value="' . $row['productID'] . '">';
    echo '<input type="hidden" name="productName" value="' . $row['Name'] . '">';
    echo '<input type="hidden" name="price" value="' . $row['Price'] . '">';
    echo '<button type="submit" class="btn-buy">Buy Now</button>';
    echo '</form>';
    echo '</div>';
}

// Close the database connection
$conn->close();
?>
