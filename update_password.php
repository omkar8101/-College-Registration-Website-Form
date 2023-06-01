<?php
$servername = "5CG9266KP8";
$username = "sa";
$password = "Prexnyr937!khrth";
$dbname = "Student_Information";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];

// Check if current password is correct
$phone = ""; // Replace with the current student's phone number
$sql = "SELECT * FROM students WHERE phone = '$phone' AND password = '$currentPassword'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Current password is correct, update the password
    $sql = "UPDATE students SET password = '$newPassword' WHERE phone = '$phone'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error updating password: " . $conn->error);
    } else {
        echo "Password updated successfully!";
    }
} else {
    echo "Incorrect current password.";
}

$conn->close();
?>
