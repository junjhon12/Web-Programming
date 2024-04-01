<?php

$host = "localhost";
$username = "qle17";
$password = "qle17";
$dbname = "qle17";

$conn = new mysqli($host, $username, $password, $dbname);
# Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
echo mysql_get_server_info($conn);
$conn->close();
?>