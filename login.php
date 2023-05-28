<?php
$serverName = "5CG9266KP8";
$connectionOptions = array(
    "Database" => "Student_Information",
    "Uid" => "your_username",
    "PWD" => "C123456789"
);

// Create a database connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Get form data
$phone = $_POST['phone'];
$password = $_POST['password'];

// Prepare the SQL statement
$sql = "SELECT * FROM students WHERE phone = ? AND password = ?";
$params = array($phone, $password);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($stmt)) {
    // User authentication successful, retrieve student's subjects
    $row = sqlsrv_fetch_array($stmt);
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

// Close the statement and connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
