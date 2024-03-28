<?php

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

// sql to create table
$sql = "CREATE TABLE Employees (
    emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    emp_name VARCHAR(50) NOT NULL,
    job_title VARCHAR(50) NOT NULL,
    hire_date DATE NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    dept_id INT(6) NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "Table Employees created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Inserting to the table
$sql = "INSERT INTO Employees (emp_name, job_title, hire_date, salary, dept_id)"
    . "VALUES ('John Doe', 'Manager', '2017-01-01', 50000.00, 1)";

// Check if the record was inserted successfully
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$result = $conn->query("SELECT * FROM Employees");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> emp_id: ". $row["emp_id"]. " - emp_name: ". $row["emp_name"]. " - job_title: " . $row["job_title"] . " - hire_date: " . $row["hire_date"] . " - salary: " . $row["salary"] . " - dept_id: " . $row["dept_id"];
    }
} else {
    echo "0 results";
}

?>