<?php
$servername = "5CG9266KP8";
$username = "sa";
$password = "C123456789";
$dbname = "Student_Information";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$phone = $_POST['phone'];
$password = $_POST['password'];


$sql = "SELECT * FROM students WHERE phone = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $phone, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $subject1 = $row['subject1'];
    $subject2 = $row['subject2'];
    $subject3 = $row['subject3'];
    $subject4 = $row['subject4'];
    $subject5 = $row['subject5'];

    
    echo "Subjects:<br>";
    echo "Subject 1: $subject1<br>";
    echo "Subject 2: $subject2<br>";
    echo "Subject 3: $subject3<br>";
    echo "Subject 4: $subject4<br>";
    echo "Subject 5: $subject5<br>";
} else {
    // Invalid credentials
    echo "Invalid phone number or password.";
}


$stmt->close();
$conn->close();
?>
