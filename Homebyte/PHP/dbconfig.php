<?php

// database connection
$conn = new mysqli('localhost', 'root', '', 'Homebyte');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}