<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    require_once "dbconnection.php";

    // Escape user inputs for security (avoid SQL injection)
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if new password matches the confirm password
    if ($newPassword !== $confirmPassword) {
        $message = "Error: New password and confirm password do not match.";
    } else {
        // Hash the new password before storing it in the database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql = "UPDATE Users SET Password = '$hashedPassword' WHERE Username = '$username'";

        if (mysqli_query($conn, $sql)) {
            $message = "Password updated successfully.";
        } else {
            $message = "Error updating password: " . mysqli_error($conn);
        }
    }

    // Close database connection
    mysqli_close($conn);

    // Redirect back to dashboard.php with the message as a query parameter
    header("Location: dashboard.php?message=" . urlencode($message));
    exit();
}
?>
