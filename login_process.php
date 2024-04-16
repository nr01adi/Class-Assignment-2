<?php
// login_process.php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check user credentials
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Check if user is already logged in
        if (!isset($_SESSION['username'])) {
            $_SESSION['username'] = $username; // Store username in session for one-time login
        }
        // Redirect to test2.html
        header("Location: test2.html");
        exit; // Ensure script execution stops after redirection
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>