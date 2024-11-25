<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Admin-landing-page.php"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$id = $_POST['id'];
$user_type = $_POST['user_type'];

// Determine the table based on user type
$table = '';
if ($user_type === 'admin') {
    $table = 'Admin_Login';
} elseif ($user_type === 'therapist') {
    $table = 'Therapist_Login';
}

// Delete user if table is valid
if ($table) {
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid user type.";
}

$conn->close();

// Redirect back to the admin page
header("Location: Admin-landing-page.php");
exit;
?>
