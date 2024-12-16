<?php
session_start();

// Check if the user is already logged out (no session exists)
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or another appropriate page
    header("Location: login.php"); // Change 'login.php' to the page you want to redirect to
    exit;
}

// Destroy the session (log out the user)
session_destroy();

// Redirect the user to the login page or another appropriate page after logout
header("Location: login.php"); // Change 'login.php' to the page you want to redirect to
exit;
?>
