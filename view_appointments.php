<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="styles.css">
    <h1>Welcome to Our Beauty Zone Parler</h1>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="book_appointment.html">Book Appointment</a></li>
            <li><a href="view_appointments.php">View Appointments</a></li>
                      
        </ul>
</head>
<body>';

if ($result->num_rows > 0) {
    echo "<h2>Appointments List</h2>";
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Date</th><th>Time</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["appointment_date"]. "</td><td>" . $row["appointment_time"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No appointments found.";
}

$conn->close();


?>
