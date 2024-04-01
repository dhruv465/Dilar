<?php


// Your database configuration
include('./dbconnection.php');

// Function to check if the user's IP is allowed
function checkIPAllowed() {
    global $conn;

    $visitorIP = $_SERVER['REMOTE_ADDR'];
    $allowedIPs = array(
        '103.124.143.30',
        '103.124.143.31',
        '103.124.143.32',
        '103.124.143.33',
        '103.124.143.34',
        '103.124.143.35',
        '103.124.143.36',
        '103.124.143.37',
        '103.124.143.38',
        '103.124.143.39',
        '103.124.143.40',
        '103.121.71.217',
        '103.124.143.34',
        '103.35.134.238',
        '127.0.0.1',
    );

    // Check if the user's IP is in the allowed list
    if (!in_array($visitorIP, $allowedIPs)) {
        // IP address is not allowed, deny access and display custom HTML message
        echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: black;
            color: white;
        }

        h1 {
            color: red;
        }

        h6 {
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
    <title>Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-display-middle">
        <h1 class="w3-jumbo w3-animate-top w3-center"><code>Access Denied</code></h1>
        <hr class="w3-border-white w3-animate-left" style="margin:auto;width:50%">
        <h3 class="w3-center w3-animate-right">You don't have permission to view this site.</h3>
        <h3 class="w3-center w3-animate-zoom">🚫🚫🚫🚫</h3>
        <h6 onclick="location.reload()" class="w3-center w3-animate-zoom">REFRESH THE PAGE</h6>
        <!-- Refresh button -->
    </div>
</body>
</html>
HTML;
        exit; // Stop further execution
    }

    // Check if the user's IP status allows login
    $query_ip_status = "SELECT IP_Status FROM Users WHERE IP_Status = 1";
    $result_ip_status = mysqli_query($conn, $query_ip_status);

    if (!$result_ip_status || mysqli_num_rows($result_ip_status) == 0) {
        // IP status does not allow login, deny access
        echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: black;
            color: white;
        }

        h1 {
            color: red;
        }

        h6 {
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
    <title>Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-display-middle">
        <h1 class="w3-jumbo w3-animate-top w3-center"><code>Access Denied</code></h1>
        <hr class="w3-border-white w3-animate-left" style="margin:auto;width:50%">
        <h3 class="w3-center w3-animate-right">Your IP status does not allow login.</h3>
        <h3 class="w3-center w3-animate-zoom">🚫🚫🚫🚫</h3>
        <h6 onclick="location.reload()" class="w3-center w3-animate-zoom">REFRESH THE PAGE</h6>
        <!-- Refresh button -->
    </div>
</body>
</html>
HTML;
        exit; // Stop further execution
    }

    // Check if the IP address is still in the allowed list
    if (!in_array($visitorIP, $allowedIPs)) {
        // IP address changed to not allowed, deny access
        echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: black;
            color: white;
        }

        h1 {
            color: red;
        }

        h6 {
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
    <title>Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-display-middle">
        <h1 class="w3-jumbo w3-animate-top w3-center"><code>Access Denied</code></h1>
        <hr class="w3-border-white w3-animate-left" style="margin:auto;width:50%">
        <h3 class="w3-center w3-animate-right">Access denied. Your IP address changed to ('.$visitorIP.') which is not authorized to access this page.</h3>
        <h3 class="w3-center w3-animate-zoom">🚫🚫🚫🚫</h3>
        <h6 onclick="location.reload()" class="w3-center w3-animate-zoom">REFRESH THE PAGE</h6>
        <!-- Refresh button -->
    </div>
</body>
</html>
HTML;
        exit; // Stop further execution
    }
}
?>
