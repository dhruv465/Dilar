<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the userID and isChecked parameters are set in the POST data
    if (isset($_POST['userID']) && isset($_POST['isChecked'])) {
        // Get the userID and isChecked values from the POST data
        $userID = $_POST['userID'];
        $isChecked = $_POST['isChecked'];

        // Connect to the database
        include ('dbconnection.php');

        // Update SessionActive value in the database
        $sql = "UPDATE Users SET SessionActive = ? WHERE UserID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $isChecked, $userID);
        $stmt->execute();

        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Send a response back to the client (optional)
        echo "SessionActive updated successfully";
    } else {
        // Handle missing parameters error
        echo "Error: Missing parameters";
    }
} else {
    // Handle invalid request method error
    echo "Error: Invalid request method";
}
?>
