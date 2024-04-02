<?php
session_start();

$host = "localhost";
$username = "qle17";
$password = "qle17";
$dbname = "qle17";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Create table
$sql = "CREATE TABLE users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(32) NOT NULL
)";
$conn->query($sql);

$dbuser = $_POST["username"];
$dbpass = md5($_POST["password"]); // Hash the password with md5

$sql = "SELECT * FROM users WHERE username = '$dbuser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['password'] === $dbpass) {
        $_SESSION['user_id'] = $user['user_id']; // Set session variable
        // Redirect to employee details page
        header("Location: newemployee.php");
        exit();
    }
}

// Redirect back to login page if authentication fails
header("Location: login.php");
exit();
?>