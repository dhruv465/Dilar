<?php
// Include your database connection code here
include 'dbconnection.php'; // Assuming your database connection code is in dbconnection.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $dataID = $_POST['data_id']; // Assuming 'data_id' is sent from the form
    $category = $_POST['category']; // Assuming 'category' is sent from the form

    // Debugging: Print received data
    echo "Data ID: $dataID, Category: $category";

    // Update the disposition in the database
    $sql = "UPDATE FormData SET Disposition = ? WHERE DataID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $category, $dataID);

    if (mysqli_stmt_execute($stmt)) {
        echo "Database updated successfully"; // Debugging message
        mysqli_stmt_close($stmt);
    } else {
        echo "Error updating database: " . mysqli_error($conn); // Debugging error message
        mysqli_stmt_close($stmt);
    }

    // Redirect user to test.php after updating the disposition
    header("Location: bucket.php");
    exit(); // Stop further execution
} else {
    // Handle invalid requests or direct access to this script
    echo "Invalid request";
}
