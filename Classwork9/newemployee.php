<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $job_title = $_POST['job_title'];
    $hire_date = $_POST['hire_date'];
    $salary = $_POST['salary'];

    // Validate the form data (e.g. check for empty fields, validate data types, etc.)

    // Connect to the database
    $conn = new mysqli('localhost', 'username', 'password', 'database_name');

    // Check if the connection was successful
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Insert the employee data into the database
    $sql = "INSERT INTO employee (emp_id, emp_name, job_title, hire_date, salary) VALUES ('$emp_id', '$emp_name', '$job_title', '$hire_date', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "Employee data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<form method="POST" action="">
    <label for="emp_id">Employee ID:</label>
    <input type="text" name="emp_id" id="emp_id" required><br>

    <label for="emp_name">Employee Name:</label>
    <input type="text" name="emp_name" id="emp_name" required><br>

    <label for="job_title">Job Title:</label>
    <input type="text" name="job_title" id="job_title" required><br>

    <label for="hire_date">Hire Date:</label>
    <input type="date" name="hire_date" id="hire_date" required><br>

    <label for="salary">Salary:</label>
    <input type="number" name="salary" id="salary" required><br>

    <input type="submit" value="Submit">
</form>