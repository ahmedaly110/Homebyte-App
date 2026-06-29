<?php 
// Perform user authentication logic here

// If authentication is successful, set session and redirect to checkout
if ($authenticationSuccessful) {
    session_start();
    $_SESSION['username'] = $username; // Set the user's session data
    header("Location: ../checkout.php");   // Redirect to the checkout page
    exit(); // Terminate further execution
} else {
    // If authentication fails, redirect back to the sign-in page with an error message
    header("Location: ../signin.php?error=1");
    exit();
}
?>
