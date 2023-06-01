<?php
$servername = "localhost";
$username = "root";
$password = "Prexnyr937!khrth";
$dbname = "Student_Information";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];


$sql = "INSERT INTO students (name, phone, password, subject1, subject2, subject3, subject4, subject5)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $name, $phone, $password, $subject1, $subject2, $subject3, $subject4, $subject5);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Registration successful!";
} else {
    echo "Error occurred while registering the student.";
}


$stmt->close();
$conn->close();
?>
