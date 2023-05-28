<?php
// Establish database connection and retrieve current student data
$serverName = "5CG9266KP8";
$connectionOptions = array(
    "Database" => "Student_Information",
    "Uid" => "your_username",
    "PWD" => "C123456789"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Get form data
$newPhone = $_POST['newPhone'];

$phone = ""; // Replace with the current student's phone number
$sql = "UPDATE students SET phone = '$newPhone' WHERE phone = '$phone'";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Phone number updated successfully!";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
