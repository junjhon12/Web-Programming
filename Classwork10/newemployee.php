<?php
session_start();
// Create a database with the following tables and fields:
if (isset($_POST['submit'])) {
    $emp_name = $_POST['emp_name'];
    $job_title = $_POST['job_title'];
    $hire_date = $_POST['hire_date'];
    $salary = $_POST['salary'];
    $dept_id = $_POST['dept_id'];
// Create a PHP form newemployee.php that has textboxes that will allow you to enter all the employee data into the database. You will have to insert your data in your department table before you insert Employee data from your form.
    $conn = new mysqli('localhost', 'root', '', 'employees');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Create another PHP page viewemployees.php that will insert the data sent from the form, and print out all employee data and each employee's department. Submit a link on the CODD server to newemployee.php
    $sql = "INSERT INTO employee (emp_name, job_title, hire_date, salary, dept_id) VALUES ('$emp_name', '$job_title', '$hire_date', '$salary', '$dept_id')";
// sql to create table
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
// sql to create table
    $conn->close();

    header("Location: viewemployees.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>New Employee Form</h2>

<form action="viewemployees.php" method="post">
    Employee ID:<br>
    <input type="number" name="emp_id">
    <br>
    Employee Name:<br>
    <input type="text" name="emp_name" required>
    <br>
    Job Title:<br>
    <input type="text" name="job_title">
    <br>
    Hire Date:<br>
    <input type="date" name="hire_date">
    <br>
    Salary:<br>
    <input type="number" name="salary" step="0.01">
    <br>
    Department ID:<br>
    <input type="number" name="dept_id">
    <br><br>
    <input type="submit" value="Submit">
</form> 

</body>
</html>