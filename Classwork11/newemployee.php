<!DOCTYPE html>
<html>
<head>
    <title>New Employee Form</title>
</head>
<body>
    <h1>New Employee Form</h1>
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