<?php
// profile.php
 
// Start the session to access the stored username
session_start();

// Check if the user is logged in (username is stored in the session)
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If not logged in, redirect to the login page or handle as needed
    header("Location: login.php");
    exit();
}
?>

<!-- HTML code for the profile dropdown menu -->
<li class="popup">
    <a href="javascript:myFunction();">
        <i class="fa fa-user" aria-hidden="true"></i>
    </a>
    <span class="popuptext" id="myPopup">
        <div class="col-md-10 offset-md-1">
            <div class="login-form">
                <h3>Username: <?php echo $username; ?></h3>
                <ul>
                    <li><a href="profile_settings.php">Profile Settings</a></li>
                    <!-- Add other profile options here -->
                    <li><a href="PHP/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </span>
</li>
