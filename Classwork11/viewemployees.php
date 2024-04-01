<?php
$host = "localhost";
$username = "qle17";
$password = "qle17";
$dbname = "qle17";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $job_title = $_POST["job_title"];
    $hire_date = $_POST["hire_date"];
    $salary = $_POST["salary"];
    $dept_id = $_POST["dept_id"];

    $sql = "INSERT INTO employees (emp_id, emp_name, job_title, hire_date, salary, dept_id)
    VALUES (0, A, B, 0, 0, 0)";

    if ($conn->query($sql) === TRUE) {
        echo "New employee record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve and display all employee data
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Employee ID: " . $row["emp_id"] . "<br>";
        echo "Employee Name: " . $row["emp_name"] . "<br>";
        echo "Job Title: " . $row["job_title"] . "<br>";
        echo "Hire Date: " . $row["hire_date"] . "<br>";
        echo "Salary: " . $row["salary"] . "<br>";
        echo "Department ID: " . $row["dept_id"] . "<br><br>";
    }
} else {
    echo "No employees found";
}

// Department Table
$sql = "CREATE TABLE Departments (
    dept_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dept_name VARCHAR(30) NOT NULL,
    )";
    
$sqk = "CREATE TABLE Employee (
    emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    emp_name VARCHAR(30) NOT NULL,
    job_title VARCHAR(30) NOT NULL,
    hire_date DATE NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    dept_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (dept_id) REFERENCES Departments(dept_id)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table Departments created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($sql) === TRUE) {
    echo "Table Employee created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$conn->close();
?>