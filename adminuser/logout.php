<link rel="icon" type="image/x-icon" href="./images.png">

<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header('location: login.php');
exit();
?>