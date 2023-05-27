<?php
$hostname = 'your_hostname';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
