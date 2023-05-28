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
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];

// Check if current password is correct
$phone = ""; // Replace with the current student's phone number
$sql = "SELECT * FROM students WHERE phone = '$phone' AND password = '$currentPassword'";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($stmt)) {
    // Current password is correct, update the password
    $sql = "UPDATE students SET password = '$newPassword' WHERE phone = '$phone'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Password updated successfully!";
    }
} else {
    echo "Incorrect current password.";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
