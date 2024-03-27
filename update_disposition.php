<?php
// Include your database connection code here
include('dbconnection.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the request
    $dataID = $_POST['dataID'];
    $category = $_POST['category'];

    // Validate the data before updating (optional but recommended)
    if (empty($dataID) || empty($category)) {
        // Send an error response if required data is missing
        echo json_encode(['success' => false, 'message' => 'Missing data']);
        exit; // Terminate script execution
    }

    // Prepare and execute the SQL statement to update the database
    $sql = "UPDATE FormData SET Category = :category WHERE DataID = :dataID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':dataID', $dataID);

    // Check if the update was successful
    if ($stmt->execute()) {
        // Send a success response back to the client
        echo json_encode(['success' => true]);
    } else {
        // Send an error response back to the client
        echo json_encode(['success' => false, 'message' => 'Failed to update category']);
    }
} else {
    // Send an error response if the request method is not POST
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
