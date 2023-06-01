<?php
$servername = "5CG9266KP8";
$username = "sa";
$password = "Prexnyr937!khrth";
$dbname = "Student_Information";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$newPhone = $_POST['newPhone'];

$phone = ""; // Replace with the current student's phone number
$sql = "UPDATE students SET phone = '$newPhone' WHERE phone = '$phone'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
} else {
    echo "Phone number updated successfully!";
}

$conn->close();
?>
