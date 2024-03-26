<?php
session_start();

include('./dbconnection.php');

if(isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    $query_update = 'UPDATE Users SET SessionActive = false WHERE UserID = ?';
    $stmt_update = mysqli_prepare($conn, $query_update);
    mysqli_stmt_bind_param($stmt_update, 'i', $userID);
    mysqli_stmt_execute($stmt_update);

    session_unset();
    session_destroy();

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
