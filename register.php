<?php
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


// Database connection
$conn = new mysqli('localhost','root','','gotours');
if($conn->connect_error){
    echo "Connection Failed: " . $conn->connect_error;
    exit;
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO register(username, email, password) VALUES(?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
} else {
    echo "Registration successful.";
}

$stmt->close();
$conn->close();
?>
