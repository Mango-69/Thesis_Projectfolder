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

    <h2>Admin Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Number</th>
            <th>Password</th>
            <th>Created At</th>
        </tr>
        <?php 
        
        / Database connection
        $con = new mysqli('localhost', 'root', '', 'thesis_project');
        
        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            echo "Connected successfully";
        
        }
        
        if (isset($admin_result) && $admin_result->num_rows > 0): ?>
            <?php while ($row = $admin_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['id_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
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
        <?php if (isset($therapist_result) && $therapist_result->num_rows > 0): ?>
            <?php while ($row = $therapist_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No therapists found.</td></tr>
        <?php endif; ?>
    </table>

</body>
</html>
