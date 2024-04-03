<!--
Step 1)
Create a database with the following tables and fields:

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

Step 2)Employee Database Add on (Session based Authentication)
Please add a log in page that asks for a username and password before you get to the form to enter the Employee data.

Create a user table that will store a user_id, username and password. If your username and password don't match what you have in the database you should redirect the user to the log in page. If the user name and password work then the user should be able to enter employee details. You should use a session variable to mark that the user is authenticated. Use the md5 function in PHP so that you do not store a plaintext version of the password. Please include the working username and password in your submission.

Step 3)Account Sign up page
Please create an account signup page for your employee database. The account signup page should allow someone to enter a username and password for the site. Once the form is submitted it should take the user to the login page where they can enter their username and password. Once the user logs in they should have access to the page to enter details for employees. On your user login page if the user enters the incorrect password, you should display two links. One link should direct the user to the login page, the other link should allow the user to create an account. Please submit a codd link to your user account creation page. 

Please separate the files for each step by commenting the file name
Make sure the tables are created inside the file viewemployees.php
The databse is hostnamed: localhost, username: qle17, password: qle17, database: qle17
-->
# newemployee.php
<!DOCTYPE html>
<html>
<head>
    <title>New Employee Form</title>
</head>
<body>
    <h1>New Employee Form</h1>
    <?php
    // This code checks if the user is authenticated, if not, it redirects to the login page
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

# viewemployees.php
<?php
// Connect to the database
start_session();
$mysqli = new mysqli('localhost', 'qle17', 'qle17', 'qle17');

// Check connection
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql = "CREATE TABLE IF NOT EXISTS Employee (
    emp_id INT AUTO_INCREMENT PRIMARY KEY,
    emp_name VARCHAR(255) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    hire_date DATE NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    dept_id INT NOT NULL,
    FOREIGN KEY (dept_id) REFERENCES Department(dept_id)
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table Employee created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Department (
    dept_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table Department created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$sql = "CREATE TABLE IF NOT EXISTS User (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table User created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$sql = "INSERT INTO User (username, password) VALUES ('qle17', 'qle17')";
$result = $mysqli->query($sql);

// Query to fetch all employee data and their department
$query = "SELECT e.emp_id, e.emp_name, e.job_title, e.hire_date, e.salary, d.name AS department_name
          FROM Employee e
          INNER JOIN Department d ON e.dept_id = d.dept_id";

// Execute the query
$result = $mysqli->query($query);
?>

# login.php
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h1>User Signup</h1>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

# signup.php
<?php
session_start();

// Connect to the database
$mysqli = new mysqli('localhost', 'qle17', 'qle17', 'qle17');

// Check connection
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Insert the user data into the user table
    $query = "INSERT INTO User (username, password) VALUES ('$username', '$password')";
    $result = $mysqli->query($query);

    if ($result) {
        // Redirect to login.php
        header("Location: login.php");
        exit();
    } else {
        echo "Error creating user account: " . $mysqli->error;
    }
}

// Close the database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Signup</title>
</head>
<body>
    <h1>User Signup</h1>
    <form method="POST" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Signup">
    </form>
</body>
</html>
