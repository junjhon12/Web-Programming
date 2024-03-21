<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $job_title = $_POST["job_title"];
    $hire_date = $_POST["hire_date"];
    $salary = $_POST["salary"];
    $dept_id = $_POST["dept_id"];
}

if($emp_id && $emp_name && $job_title && $hire_date && $salary && $dept_id) {
    echo "<h2>Thank you for entering a new employee!</h2>";
    echo "<p><strong>Employee ID:</strong> $emp_id</p>";
    echo "<p><strong>Employee Name:</strong> $emp_name</p>";
    echo "<p><strong>Job Title:</strong> $job_title</p>";
    echo "<p><strong>Hire Date:</strong> $hire_date</p>";
    echo "<p><strong>Salary:</strong> $salary</p>";
    echo "<p><strong>Department ID:</strong> $dept_id</p>";

    // Set cookie to remember
    setcookie("emp_id", $emp_id, time() + (86400 * 30), "/");
    setcookie("emp_name", $emp_name, time() + (86400 * 30), "/");
    setcookie("job_title", $job_title, time() + (86400 * 30), "/");
    setcookie("hire_date", $hire_date, time() + (86400 * 30), "/");
    setcookie("salary", $salary, time() + (86400 * 30), "/");
    setcookie("dept_id", $dept_id, time() + (86400 * 30), "/");
} else {
    echo "<h2>Sorry! You didn’t complete the form. Please try again.</h2>";
    echo "<p><a href='newemployee.html'>Go back to the employee form</a></p>";
}

// Link to newemployee.php on the CODD server
$new_employee_link = "http://CODD_SERVER/newemployee.php";


?>