<?php
// Start session
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Thesis_Projectfolder";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user type
$user_type = $_POST['user-type'];

// Prepare SQL statement based on user type
if ($user_type === 'student') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO Student_Login (username_email, password, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

} elseif ($user_type === 'admin') {
    $id_number = $_POST['id-number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO Admin_Login (id_number, password, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $id_number, $password);

} elseif ($user_type === 'therapist') {
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO Therapist_Login (name, password, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $password);
}

// Execute query and handle errors
if (isset($stmt) && $stmt->execute()) {
    // Redirect to Main-page.html upon successful registration
    header("Location: ../Main-page.html");
    exit;
} else {
    echo "Error: " . $conn->error;
}

// Close the statement and database connection
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();
?>