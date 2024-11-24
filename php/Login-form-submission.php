<?php
// Configuration
$dbhost = "localhost";
$dbname = "database_name";
$dbuser = "username";
$dbpass = "password";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userType = $_POST["user-type"]; // Capture the user type

    // Query to retrieve user data
    // Make sure to adjust database structure to include user type if necessary
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_type = '$userType'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User authenticated, redirect to main page
        header("Location: main_page.html");
        exit;
    } else {
        // Invalid credentials, display error message
        echo "Invalid username or password.";
    }
}

$conn->close();
?>