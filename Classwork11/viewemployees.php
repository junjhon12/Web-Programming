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

if (isset($_POST('register'))) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO User (username, password) VALUES ('$username', '$password')";
    $result = $mysqli->query($sql);
    if ($result) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error creating user account: " . $mysqli->error;
    }
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