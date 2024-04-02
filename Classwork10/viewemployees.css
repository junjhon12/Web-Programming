<?php

    $localhost = 'localhost';
    $username = 'qle17';
    $password = 'qle17';
    $database = 'qle17';
    
    // Connect to the database
    $db = new mysqli('localhost', 'username', 'password', 'database');

    // Check the connection
    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }

    // Prepare and bind
    $stmt = $db->prepare('INSERT INTO Employee (emp_name, job_title, hire_date, salary, dept_id) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('sssd', $_POST['emp_name'], $_POST['job_title'], $_POST['hire_date'], $_POST['salary'], $_POST['dept_id']);

    // Execute the statement
    $stmt->execute();

    // Get all employees and their departments
    $result = $db->query('SELECT e.*, d.name AS dept_name FROM Employee e JOIN Department d ON e.dept_id = d.dept_id');

    // Print all employees and their departments
    while ($row = $result->fetch_assoc()) {
        echo 'Employee ID: ' . $row['emp_id'] . '<br>';
        echo 'Employee Name: ' . $row['emp_name'] . '<br>';
        echo 'Job Title: ' . $row['job_title'] . '<br>';
        echo 'Hire Date: ' . $row['hire_date'] . '<br>';
        echo 'Salary: ' . $row['salary'] . '<br>';
        echo 'Department: ' . $row['dept_name'] . '<br><br>';
    }
?>