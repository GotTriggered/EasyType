<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST["username"];
$password = $_POST["password"];

// Check if user exists
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
        header('location:index.html');
    } else{
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

$conn->close();
?>