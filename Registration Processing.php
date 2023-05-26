<?php
// Establish database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];

// Insert student data into the database
$sql = "INSERT INTO students (name, phone, password, subject1, subject2, subject3, subject4, subject5)
        VALUES ('$name', '$phone', '$password', '$subject1', '$subject2', '$subject3', '$subject4', '$subject5')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
