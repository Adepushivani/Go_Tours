<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phonenumber = $_POST['phonenumber'] ?? '';
$source = $_POST['source'] ?? '';
$destination = $_POST['destination'] ?? '';



// Database connection
$conn = new mysqli('localhost','root','','gotours');
if($conn->connect_error){
    echo "Connection Failed: " . $conn->connect_error;
    exit;
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO booking(name, email, phonenumber, source, destination) VALUES(?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $name, $email, $phonenumber, $source, $destination);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
} else {
    echo "Booking successful.";
}

$stmt->close();
$conn->close();
?>
