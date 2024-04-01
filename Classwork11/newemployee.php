<?php

# Connect to the MySQL database
$servername = "localhost";
$username = "qle17"
$password - "qle17";
$database_name = "qle17";

# Create a connection to the database
# By creating a connection to the database, we can interact with the database
$connection = new mysqpli($servername, $username, $password, $database_name);

# Checking the connection to the database is a good practice
if ($connection -> connect_error) {
    # die() will stop the script from running and display an error message
    die("Connection failed: " . $connection -> connect_error);
} else {
    echo "Connected successfully";
}

# Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # Get the values from the form
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $job_title = $_POST["job_title"];
    $hire_date = $_POST["hire_date"];
    $salary = $_POST["salary"];
    $dept_id = $_POST["dept_id"];
}

# SQL query to create tables
$sql = 
"CREATE TABLE employees (
    emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    emp_name VARCHAR(30) NOT NULL,
    job_title VARCHAR(30) NOT NULL,
    hire_date DATE NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    dept_id INT(6) UNSIGNED NOT NULL
)

CREATE TABLE departments (
    dept_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dept_name VARCHAR(30) NOT NULL
)";

# Check if the query was successful
if ($connection -> multi_query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection -> error;
}


# Create a SQL query to insert the values into the database
# The SQL query will insert the values from the form into the employees table
$sql = "INSERT INTO employees (emp_id, emp_name, job_title, hire_date, salary, dept_id) VALUES ('$emp_id', '$emp_name', '$job_title', '$hire_date', '$salary', '$dept_id')";

# Checking if the query was successful is a good practice
if ($connection -> query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection -> error;
}

# Close the connection to the database
# Closing the connection to the database is a good practice since it frees up resources and prevents unauthorized access to the database
$connection -> close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>New Employee</title>
</head>
<body>
    <h1>New Employee</h1>
    <!-- The form will allow the user to input the values for the new employee -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- The form will submit the values to the same page -->
        <label for="emp_id">Employee ID:</label>
        <input type="text" name="emp_id" id="emp_id" required><br><br>
        <label for="emp_name">Employee Name:</label>
        <input type="text" name="emp_name" id="emp_name" required><br><br>
        <label for="job_title">Job Title:</label>
        <input type="text" name="job_title" id="job_title" required><br><br>
        <label for="hire_date">Hire Date:</label>
        <input type="date" name="hire_date" id="hire_date" required><br><br>
        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" required><br><br>
        <label for="dept_id">Department ID:</label>
        <input type="text" name="dept_id" id="dept_id" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>