<?php
// Create a database with the following tables and fields:
$host = "localhost";
$username = "qle17";
$password = "qle17";
$dbname = "qle17";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed";
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Create database
$sql = "CREATE DATABASE database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
echo mysql_get_server_info($conn);

// sql to create table
$sql = "CREATE TABLE employee (
emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
emp_name VARCHAR(30) NOT NULL,
job_title VARCHAR(30) NOT NULL,
hire_date DATE,
salary DECIMAL(10, 2),
dept_id INT(6) NOT NULL
)";
// sql to create table
if ($conn->query($sql) === TRUE) {
    echo "Table employee created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
// sql to create table
$sql = "CREATE TABLE department (
dept_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)";
// sql to create table
if ($conn->query($sql) === TRUE) {
    echo "Table department created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>