<?php
$servername = "5CG9266KP8";
$username = "sa";
$password = "C123456789";
$dbname = "Student_Information";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$phone = $_POST['phone'];
$password = $_POST['password'];

// Check if user credentials are valid
$sql = "SELECT * FROM students WHERE phone = '$phone' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authentication successful, retrieve student's subjects
    $row = $result->fetch_assoc();
    $subject1 = $row['subject1'];
    $subject2 = $row['subject2'];
    $subject3 = $row['subject3'];
    $subject4 = $row['subject4'];
    $subject5 = $row['subject5'];

    // Display subjects
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

$conn->close(); // Close the database connection
?>
