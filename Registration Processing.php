<?php
$serverName = "5CG9266KP8";
$connectionOptions = array(
    "Database" => "Student_Information",
    "Uid" => "your_username",
    "PWD" => "C123456789"
);

// Establish database connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
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

// Prepare the SQL statement
$sql = "INSERT INTO students (name, phone, password, subject1, subject2, subject3, subject4, subject5)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$params = array($name, $phone, $password, $subject1, $subject2, $subject3, $subject4, $subject5);
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_rows_affected($stmt) > 0) {
    echo "Registration successful!";
} else {
    echo "Error occurred while registering the student.";
}

// Close the connection
sqlsrv_close($conn);
?>
