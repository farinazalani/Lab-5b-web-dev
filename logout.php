<?php
// Start session
session_start();

// Destroy session
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Redirect to the login page
header("Location: login.php");
exit;
?>