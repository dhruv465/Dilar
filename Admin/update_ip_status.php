<?php
include('dbconnection.php');

// Handle POST request to update IP status
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the IP Status value from the POST data
    $ipStatus = isset($_POST['ipStatus']) ? intval($_POST['ipStatus']) : 0;

    // Update the IP Status in the database for all rows
    $sql = "UPDATE Users SET IP_Status = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $ipStatus);
    mysqli_stmt_execute($stmt);

    // Check if update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo 'IP Status updated successfully';
    } else {
        echo 'Failed to update IP Status';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle other request methods or invalid requests
    http_response_code(405); // Method Not Allowed
    echo 'Invalid request method';
}

// Close the connection
mysqli_close($conn);
?>
