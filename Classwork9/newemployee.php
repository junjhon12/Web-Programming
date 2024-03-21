<?php
    session_start();

    // Check if the cookie is set
    if (isset($_COOKIE['emp_id'])) {
        $emp_id = $_COOKIE['emp_id'];
    } else {
        $emp_id = '';
    }
    if (isset($_COOKIE['emp_name'])) {
        $emp_name = $_COOKIE['emp_name'];
    } else {
        $emp_name = '';
    }
    if (isset($_COOKIE['job_title'])) {
        $job_title = $_COOKIE['job_title'];
    } else {
        $job_title = '';
    }
    if (isset($_COOKIE['hire_date'])) {
        $hire_date = $_COOKIE['hire_date'];
    } else {
        $hire_date = '';
    }
    if (isset($_COOKIE['salary'])) {
        $salary = $_COOKIE['salary'];
    } else {
        $salary = '';
    }
    if (isset($_COOKIE['dept_id'])) {
        $dept_id = $_COOKIE['dept_id'];
    } else {
        $dept_id = '';
    }

    // Set the cookie when the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['emp_id'])) {
        $emp_id = $_POST['emp_id'];
        setcookie('emp_id', $emp_id, time() + (86400 * 30), '/');
        $emp_name = $_POST['emp_name'];
        setcookie('emp_name', $emp_name, time() + (86400 * 30), '/');
        $job_title = $_POST['job_title'];
        setcookie('job_title', $job_title, time() + (86400 * 30), '/');
        $hire_date = $_POST['hire_date'];
        setcookie('hire_date', $hire_date, time() + (86400 * 30), '/');
        $salary = $_POST['salary'];
        setcookie('salary', $salary, time() + (86400 * 30), '/');
        $dept_id = $_POST['dept_id'];
        setcookie('dept_id', $dept_id, time() + (86400 * 30), '/');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>New Employee Form</h2>
    <form action="./viewemployees.php" method="post">
        <label for="emp_id">Employee ID:</label><br>
        <input type="text" id="emp_id" name="emp_id"><br>

        <label for="emp_name">Employee Name:</label><br>
        <input type="text" id="emp_name" name="emp_name"><br>

        <label for="job_title">Job Title:</label><br>
        <input type="text" id="job_title" name="job_title"><br>

        <label for="hire_date">Hire Date:</label><br>
        <input type="date" id="hire_date" name="hire_date"><br>

        <label for="salary">Salary:</label><br>
        <input type="number" id="salary" name="salary"><br>

        <label for="dept_id">Department ID:</label><br>
        <input type="number" id="dept_id" name="dept_id"><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>