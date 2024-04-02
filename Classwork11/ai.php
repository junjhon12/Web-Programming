<!--
Create a database with the following tables and fields within the php file:

Employee Table

emp_id

emp_name

job_title

hire_date

salary

dept_id 

 

Department Table

dept_id

name

Create a PHP form newemployee.php that has textboxes that will allow you to enter all the employee data into the database. You will have to insert your data in your department table before you insert Employee data from your form.

Create another PHP page viewemployees.php that will insert the data sent from the form, and print out all employee data and each employee's department. Submit a link on the CODD server to newemployee.php

seperate the content for the newemployee.php and viewemployees.php into two different files.
comment which section of the code is for which file.

Now, follow the next instructions:
Please add a log in page that asks for a username and password before you get to the form to enter the Employee data.

Create a user table that will store a user_id, username and password. If your username and password don't match what you have in the database you should redirect the user to the log in page. If the user name and password work then the user should be able to enter employee details. You should use a session variable to mark that the user is authenticated. Use the md5 function in PHP so that you do not store a plaintext version of the password. Please include the working username and password in your submission.

Next,
Please create an account signup page for your employee database. The account signup page should allow someone to enter a username and password for the site. Once the form is submitted it should take the user to the login page where they can enter their username and password. Once the user logs in they should have access to the page to enter details for employees. On your user login page if the user enters the incorrect password, you should display two links. One link should direct the user to the login page, the other link should allow the user to create an account. Please submit a codd link to your user account creation page. 
-->

// Code for newemployee.php
<!DOCTYPE html>
<html>
<head>
    <title>New Employee Form</title>
</head>
<body>
    <h1>New Employee Form</h1>
    <?php
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header("Location: login.php");
        exit();
    }
    ?>
    <form method="POST" action="viewemployees.php">
        <label for="emp_id">Employee ID:</label>
        <input type="number" name="emp_id" required><br>

        <label for="emp_name">Employee Name:</label>
        <input type="text" name="emp_name" required><br>

        <label for="job_title">Job Title:</label>
        <input type="text" name="job_title" required><br>

        <label for="hire_date">Hire Date:</label>
        <input type="date" name="hire_date" required><br>

        <label for="salary">Salary:</label>
        <input type="number" name="salary" required><br>

        <label for="dept_id">Department ID:</label>
        <input type="number" name="dept_id" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

// Code for viewemployees.php
<?php
// Add the missing import statement for the mysqli class
require_once 'path/to/mysqli.php';

// Connect to the database
$mysqli = new mysqli('localhost', '
qle17', 'qle17', 'qle17');

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Query to fetch all employee data and their department
$query = "SELECT e.emp_id, e.emp_name, e.job_title, e.hire_date, e.salary, d.name AS department_name
          FROM Employee e
          INNER JOIN Department d ON e.dept_id = d.dept_id";

// Execute the query
$result = $mysqli->query($query);

// Check if the query was successful
if ($result) {
    // Print out the employee data and their department
    while ($row = $result->fetch_assoc()) {
        echo "Employee ID: " . $row['emp_id'] . "<br>";
        echo "Employee Name: " . $row['emp_name'] . "<br>";
        echo "Job Title: " . $row['job_title'] . "<br>";
        echo "Hire Date: " . $row['hire_date'] . "<br>";
        echo "Salary: " . $row['salary'] . "<br>";
        echo "Department: " . $row['department_name'] . "<br><br>";
    }
} else {
    echo "Error executing query: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>

// Code for login.php
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

// Code for user_signup.php
<!DOCTYPE html>
<html>
<head>
    <title>User Signup</title>
</head>
<body>
    <h1>User Signup</h1>
    <form method="POST" action="user_signup.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Signup">
    </form>
</body>
</html>

// Code for user_signup.php
<?php
// Add the missing import statement for the mysqli class
require_once 'path/to/mysqli.php';

// Connect to the database
$mysqli = new mysqli('localhost', '
qle17', 'qle17', 'qle17');

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Get the username and password from the form
$username = $_POST['username'];
$password = md5($_POST['password']);

// Insert the user data into the user table
$query = "INSERT INTO User (username, password) VALUES ('$username', '$password')";
$result = $mysqli->query($query);

if ($result) {
    echo "User account created successfully. <a href='login.php'>Login</a>";
} else {
    echo "Error creating user account: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>

// Code for login.php
<?php
// Add the missing import statement for the mysqli class
require_once 'path/to/mysqli.php';

// Connect to the database
$mysqli = new mysqli('localhost', '
qle17', 'qle17', 'qle17');

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Get the username and password from the form
$username = $_POST['username'];
$password = md5($_POST['password']);

// Query to check if the username and password match
$query = "SELECT * FROM User WHERE username = '$username' AND password = '$password'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['authenticated'] = true;
    header("Location: newemployee.php");
} else {
    echo "Invalid username or password. <a href='login.php'>Login</a> | <a href='user_signup.php'>Create Account</a>";
}

// Close the database connection
$mysqli->close();
?>

// SQL to create the Employee and Department tables
CREATE TABLE Employee (
    emp_id INT PRIMARY KEY,
    emp_name VARCHAR(255),
    job_title VARCHAR(255),
    hire_date DATE,
    salary DECIMAL(10, 2),
    dept_id INT,
    FOREIGN KEY (dept_id) REFERENCES Department(dept_id)
);

CREATE TABLE Department (
    dept_id INT PRIMARY KEY,
    name VARCHAR(255)
);

// SQL to create the User table
CREATE TABLE User (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    password VARCHAR(255)
);

// Sample data for the Department table
INSERT INTO Department (dept_id, name) VALUES (1, 'HR');
INSERT INTO Department (dept_id, name) VALUES (2, 'IT');
INSERT INTO Department (dept_id, name) VALUES (3, 'Finance');

// Sample data for the User table
INSERT INTO User (username, password) VALUES ('admin', md5('admin123'));

// Sample data for the Employee table
INSERT INTO Employee (emp_id, emp_name, job_title, hire_date, salary, dept_id) VALUES (1, 'John Doe', 'Manager', '2021-01-01', 50000, 1);
INSERT INTO Employee (emp_id, emp_name, job_title, hire_date, salary, dept_id) VALUES (2, 'Jane Smith', 'Developer', '2021-02-01', 60000, 2);
