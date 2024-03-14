<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $employeeName = $_POST["employee_name"];
    $employeeDepartment = $_POST["employee_department"];

    // Insert the data into the database or perform any other necessary operations

    // Print out all employee data and department
    echo "Employee Name: " . $employeeName . "<br>";
    echo "Employee Department: " . $employeeDepartment . "<br>";
}
?>

<!-- Your HTML form goes here -->
<form method="POST" action="viewemployees.php">
    <label for="employee_name">Employee Name:</label>
    <input type="text" name="employee_name" id="employee_name" required><br>

    <label for="employee_department">Employee Department:</label>
    <input type="text" name="employee_department" id="employee_department" required><br>

    <input type="submit" value="Submit">
</form>