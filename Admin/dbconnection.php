<?php

// Database connection parameters 156.67.222.1
$host = 'localhost';
$username = 'u443752012_Paisaadmin';
$password = 'Paisaadmin@2023';
$database = 'u443752012_Paisadb';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    exit('Connection failed: ' . mysqli_connect_error());
}

