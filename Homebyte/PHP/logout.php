<?php 
// PHP/logout.php

// Start the session to access the stored username
session_start();

// Unset and destroy the session to log the user out
session_unset();
session_destroy();

// Redirect the user to the login page or handle as needed
header("Location: ../index.php");
exit();
?>
