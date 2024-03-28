<?php

// Database connection parameters 156.67.222.1
$host = 'yourhost';
$username = 'dbusername';
$password = 'dbpass';
$database = 'dbname';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    exit('Connection failed: ' . mysqli_connect_error());
}
