<?php

$host = "localhost";
$user = "qle17";
$password = "qle17";
$database = "qle17";

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully";
}

$sql = "CREATE TABLE Employees (
    emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    emp_name VARCHAR(50) NOT NULL,
    job_title VARCHAR(50) NOT NULL,
    hire_date DATE NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    dept_id INT(6) NOT NULL)";

if ($connection->query($sql) === TRUE) {
    echo "Table Employees created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}

$sql = "INSERT INTO Employees (emp_id, emp_name, job_title, hire_date, salary, dept_id)
VALUES (1001, 'John Doe', 'Manager', '2019-01-01', 100000.00, 1)";

if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$sql = "SELECT emp_id, emp_name, job_title, hire_date, salary, dept_id FROM Employees";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Employee ID</th><th>Employee Name</th><th>Job Title</th><th>Hire Date</th><th>Salary</th><th>Department ID</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["emp_id"]. "</td><td>" . $row["emp_name"]. "</td><td>" . $row["job_title"]. "</td><td>" . $row["hire_date"]. "</td><td>" . $row["salary"]. "</td><td>" . $row["dept_id"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>