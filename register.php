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
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$cpassword = password_hash($_POST["cpassword"], PASSWORD_DEFAULT);

// Check if user already exists
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username already exists";
} else {
    // Insert data into database
    $sql = "INSERT INTO users (username, email, password, cpassword) VALUES ('$username', '$email', '$password', '$cpassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        header('location:login.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>