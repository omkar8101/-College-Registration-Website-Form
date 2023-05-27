<?php
// Assuming the form data is submitted and stored in variables
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];

// Prepare and execute the SQL statement to insert data
$sql = "INSERT INTO students (name, phone, password, subject1, subject2, subject3, subject4, subject5) 
        VALUES ('$name', '$phone', '$password', '$subject1', '$subject2', '$subject3', '$subject4', '$subject5')";

if ($conn->query($sql) === TRUE) {
    echo "Student registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
