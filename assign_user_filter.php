<?php


// Include the common header file
include 'header.php';

// Include your database configuration
include('./dbconnection.php');


// Get the logged-in user ID from the session
$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : '';

// Get the filter category from the POST data
$filterCategory = isset($_POST['filter']) ? $_POST['filter'] : '';

// Check if both userID and filterCategory are provided
if (!empty($userID) && !empty($filterCategory)) {
    // Check if the filter category is already assigned to another user
    $query_check_assigned = "SELECT UserID FROM FormData WHERE Category = ? AND Disposition IS NULL";
    $stmt_check_assigned = mysqli_prepare($conn, $query_check_assigned);
    mysqli_stmt_bind_param($stmt_check_assigned, 's', $filterCategory);
    mysqli_stmt_execute($stmt_check_assigned);
    mysqli_stmt_store_result($stmt_check_assigned);

    // If the filter category is already assigned
    if (mysqli_stmt_num_rows($stmt_check_assigned) > 0) {
        // Update 50 rows of data to the new user
        $query_update_user_id = "UPDATE FormData SET UserID = ? WHERE Category = ? AND Disposition IS NULL AND UserID IS NULL LIMIT 3";
        $stmt_update_user_id = mysqli_prepare($conn, $query_update_user_id);
        mysqli_stmt_bind_param($stmt_update_user_id, 'is', $userID, $filterCategory);
        
        mysqli_stmt_execute($stmt_update_user_id);

        // Return a success message or any other response as needed
        echo "3 rows of the selected filter category data assigned to the new user.";
    } else {
        // If the filter category is not assigned to any user, assign it to the current user
        $query_assign_user_id = "UPDATE FormData SET UserID = ? WHERE Category = ? AND Disposition IS NULL AND UserID IS NULL";
        $stmt_assign_user_id = mysqli_prepare($conn, $query_assign_user_id);
        mysqli_stmt_bind_param($stmt_assign_user_id, 'is', $userID, $filterCategory);
        mysqli_stmt_execute($stmt_assign_user_id);

        // Return a success message or any other response as needed
        echo "User assigned to the selected filter category.";
    }
} else {
    // Return an error message if userID or filterCategory is not provided
    echo "Error: User ID or filter category not provided.";
}
?>
