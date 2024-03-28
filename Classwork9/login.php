<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
}

if($username && $password) {
    echo "<h2>Thank you for entering your username and password!</h2>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Password:</strong> $password</p>";

    // Set cookie to remember
    setcookie("username", $username, time() + (86400 * 30), "/");
    setcookie("password", $password, time() + (86400 * 30), "/");
} else {
    echo "<h2>Sorry! You didn’t complete the form. Please try again.</h2>";
    echo "<p><a href='login.html'>Go back to the login form</a></p>";
}

// User table that stores username and password
$servername = "localhost";
$username = "qle17";
$password = "qle17";
$dbname = "qle17";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
    
?>