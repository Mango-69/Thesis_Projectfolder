<?php
// Database connection parameters
$servername = "localhost"; // Use 'localhost' for XAMPP
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (leave blank)
$dbname = "thesis_project"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from admin table
$admin_sql = "SELECT * FROM admin";
$admin_result = $conn->query($admin_sql);

// Fetch data from therapist table
$therapist_sql = "SELECT * FROM therapist";
$therapist_result = $conn->query($therapist_sql);

// Fetch data from student table
$student_sql = "SELECT * FROM student";
$student_result = $conn->query($student_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Landing Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    <button class="logout-btn" onclick="window.location.href='logout.php';">Logout</button>

    <h2>Admin Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Number</th>
            <th>Password</th>
            <th>Created At</th>
        </tr>
        <?php if ($admin_result->num_rows > 0): ?>
            <?php while($row = $admin_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['id_number']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">No admin users found.</td></tr>
        <?php endif; ?>
    </table>

    <h2>Therapist Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Password</th>
            <th>Created At</th>
        </tr>
        <?php if ($therapist_result->num_rows > 0): ?>
            <?php while($row = $therapist_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['contact_number']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No therapists found.</td></tr>
        <?php endif; ?>
    </table>

    <h2>Student Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Username</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Birth Date</th>
            <th>Password</th>
            <th>Created At</th>
        </tr>
        <?php if ($student_result->num_rows > 0): ?>
            <?php while($row = $student_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['contact_number']; ?></td>
                    <td><?php echo $row['birth_date']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="8">No students found.</td></tr>
        <?php endif; ?>
    </table>

</body>
</html>