<?php
// Your database configuration
include('./dbconnection.php');

// Function to check if the user's IP is allowed based on IP_Status in the database
function checkIPAllowed() {
    global $conn;

    // Check the IP status in the database
    $query_ip_status = "SELECT IP_Status FROM Users WHERE IP_Status = 1";
    $result_ip_status = mysqli_query($conn, $query_ip_status);

    // If IP_Status is 1, check the user's IP against the allowed list
    if ($result_ip_status && mysqli_num_rows($result_ip_status) > 0) {
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
        '127.0.0.1'
        );

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
    }
}

// Call the function to check IP allowance
checkIPAllowed();
?>
