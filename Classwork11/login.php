<!-- 
Please add a log in page that asks for a username and password before you get to the form to enter the Employee data.

Create a user table that will store a user_id, username and password. If your username and password don't match what you have in the database you should redirect the user to the log in page. If the user name and password work then the user should be able to enter employee details. You should use a session variable to mark that the user is authenticated. Use the md5 function in PHP so that you do not store a plaintext version of the password. Please include the working username and password in your submission.
-->
<?php
session_start();

// Connect to the database
$mysqli = new mysqli('localhost', ' qle17', 'qle17', 'qle17');

// Check connection
if ($mysqli->connect_errno) {
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