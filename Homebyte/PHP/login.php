<?php
// login.php

// include the database config file
require_once 'dbconfig.php';

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// login.php

// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    // Check if the username and password are "admin"
    if ($username === "Omar" && $password === "Omar@123") {
        // Redirect to the admin page
        header("Location: ../admineditbanner.php");
        exit();
    }

    // Query the database to get the user's data
    $stmt = $conn->prepare("SELECT userID, name, email, phone, password FROM customers WHERE email = ? OR phone = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row['password'];

        if (password_verify($password, $storedHashedPassword)) {
            // Successful login
            session_start();

            // Add cart transfer logic here
            if (isset($_SESSION['99999999'])) {
                $tempUserId = $_SESSION['99999999'];

                // Transfer items from the temporary cart to the user's cart
                $transferQuery = "UPDATE cart SET userID = ? WHERE userID = ?";
                $transferStmt = $conn->prepare($transferQuery);
                $transferStmt->bind_param("ss", $row['userID'], $tempUserId);
                if ($transferStmt->execute()) {
                    unset($_SESSION['99999999']); // Unset the temporary user ID
                } else {
                    echo "Error transferring items from the temporary cart: " . $conn->error;
                }
            }

            // Set user session variables
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            header("Location: ../shop.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password.";
        }
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }
}

$conn->close();
