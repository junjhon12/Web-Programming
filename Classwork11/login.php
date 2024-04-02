<?php
session_start();

// Connect to the database
$mysqli = new mysqli('localhost', ' qle17', 'qle17', 'qle17');

// Check connection
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Insert the user data into the user table
    $query = "INSERT INTO User (username, password) VALUES ('$username', '$password')";
    $result = $mysqli->query($query);

    if ($result) {
        // Redirect to login.php
        header("Location: login.php");
        exit();
    } else {
        echo "Error creating user account: " . $mysqli->error;
    }
}

// Close the database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Signup</title>
</head>
<body>
    <h1>User Signup</h1>
    <form method="POST" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Signup">
    </form>
</body>
</html>