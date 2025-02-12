<?php
// Database connection settings

error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "127.0.0.1";
$username = "root";  // Default XAMPP username
$password = "";  // Default XAMPP password (empty)
$dbname = "event_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $event = $_POST['events'];
    $members = $_POST['mem'];

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO registrations (name, email, contact, event, members) 
            VALUES ('$name', '$email', '$contact', '$event', '$members')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
