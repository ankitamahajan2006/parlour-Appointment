<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];

// Insert data into the database
$sql = "INSERT INTO appointments (name, email, phone, appointment_date, appointment_time) 
        VALUES ('$name', '$email', '$phone', '$appointment_date', '$appointment_time')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
