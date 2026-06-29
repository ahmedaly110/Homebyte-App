<?php
require_once 'dbconfig.php';

// Function to delete an order by order ID
function deleteOrder($orderID, $conn) {
    $deleteQuery = "DELETE FROM orders WHERE orderID = $orderID";
    if ($conn->query($deleteQuery) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Check if a delete request has been made
if (isset($_GET['delete_order'])) {
    $orderIDToDelete = $_GET['delete_order'];
    if (deleteOrder($orderIDToDelete, $conn)) {
        // Order has been deleted successfully
        echo '<script>alert("Order has been deleted successfully!");</script>';
    } else {
        // Error occurred while deleting
        echo '<script>alert("Error: Unable to delete order.");</script>';
    }
}

// Define the SQL query to retrieve order data with distinct aliases for 'name' column
$query = "SELECT * FROM orders ORDER BY orderID;"; // Ensure results are ordered by order ID

// Execute the query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Order ID</th><th>User ID</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Product ID</th><th>Product Name</th><th>Price</th><th>message</th><th>Order Date</th><th>Action</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['orderID'] . '</td>';
        echo '<td>' . $row['userID'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['productID'] . '</td>';
        echo '<td>' . $row['productName'] . '</td>';
        echo '<td>' . $row['total'] . '</td>';        
        echo '<td>' . $row['message'] . '</td>';
        echo '<td>' . $row['order_date'] . '</td>';
        echo '<td><a href="?delete_order=' . $row['orderID'] . '">Delete</a></td>';

        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No orders found.';
}

$conn->close();
?>
