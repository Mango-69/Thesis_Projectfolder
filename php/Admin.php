<?php
// Include the database connection
include 'db_connect.php';

// Fetch users
$sql = "SELECT username, email, user_type FROM users";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row["username"]. " - Email: " . $row["email"]. " - User Type: " . $row["user_type"]. "<br>";
    }
} else {
    echo "No users found";
}

// Close the connection
$conn->close();