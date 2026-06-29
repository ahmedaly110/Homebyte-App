<?php
require_once 'dbconfig.php';

// Fetch data from the messages table
$query = "SELECT * FROM messages";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['fullname'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['message'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No messages found.';
}

$conn->close();
?>