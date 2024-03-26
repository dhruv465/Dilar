<?php
// Check if a session is already active and handle it only once
if (session_status() == PHP_SESSION_NONE) {
    // Set session cookie expiration to 30 minutes
    session_set_cookie_params(32400); // Set session cookie expiration to 9 hours
    // Start the session
    session_start();
}

// Set the session timeout duration to 9 hours (32400 seconds)
$sessionTimeout = 32400;

// Check if the session is active and 9 hours have passed
if (isset($_SESSION['start_time']) && (time() - $_SESSION['start_time'] > $sessionTimeout)) {
    // Destroy the session
    session_unset();
    session_destroy();

    // Redirect to the login page
    header('Location: index.php');
    exit;
}

// Update the session start time with each request
$_SESSION['start_time'] = time();

// Check if the user is not logged in
if (!isset($_SESSION['username']) && basename($_SERVER['PHP_SELF']) != 'index.php') {
    // Redirect to the login page
    header('Location: index.php');
    exit;
}

// Prevent browser caching of session-related pages
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
?>
