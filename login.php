<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get login form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    //database connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gotours";

    $conn = new mysqli($host,$dbusername,$dbpassword, $dbname);

    if($conn=>connect_error){
        die("Connection failed: ", $conn->connect_error);

    }

    

    // Check if user exists in 'register' table
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        header("Location: book.html");
        exit();
    } else {
        header("Location: error.html");
    }

    // Close database connection
    $conn->close();
}
?>
