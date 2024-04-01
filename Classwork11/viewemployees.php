<?php

# Connect to the database
$servername = "localhost";
$username = "qle17";
$password = "qle17";
$database_name = "qle17";

# Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database_name);

# Check the connection to the database
if ($connection -> connect_error) {
    die("Connection failed: " . $connection -> connect_error);
} else {
    echo "Connected successfully";
}

# Retrieve the values from the employees table with department information
$sql = "SELECT employees.emp_id, employees.emp_name, employees.job_title, employees.hire_date, employees.salary, departments.dept_name FROM employees JOIN departments ON employees.dept_id = departments.dept_id";

# Execute the SQL query
$result = $connection -> query($sql);

# Check if the query was successful
if ($result -> num_rows > 0) {
    # Output the data from the query
    while ($row = $result -> fetch_assoc()) {
        echo "Employee ID: " . $row["emp_id"] . "<br>";
        echo "Employee Name: " . $row["emp_name"] . "<br>";
        echo "Job Title: " . $row["job_title"] . "<br>";
        echo "Hire Date: " . $row["hire_date"] . "<br>";
        echo "Salary: " . $row["salary"] . "<br>";
        echo "Department Name: " . $row["dept_name"] . "<br><br>";
    }
} else {
    echo "0 results";
}

# Close the connection to the database
$connection -> close();
?>