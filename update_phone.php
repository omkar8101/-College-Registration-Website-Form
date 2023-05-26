<?php
// Establish database connection and retrieve current student data
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$newPhone = $_POST['newPhone'];

$phone = ""; // Replace with the current student's phone number
$sql = "UPDATE students SET phone = '$newPhone' WHERE phone = '$phone'";

if ($conn->query($sql) === TRUE) {
    echo "Phone number updated successfully!";
} else {
    echo "Error updating phone number: " . $conn->error;
}

$conn->close();
?>
