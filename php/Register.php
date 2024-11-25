<?php
// Start session
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin, student, therapist";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user type
$user_type = $_POST['user-type'];

// Handle registration logic based on user type
if ($user_type === 'student') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact-no'];
    $birthdate = $_POST['birthdate-year'] . '-' . $_POST['birthdate-month'] . '-' . $_POST['birthdate-day'];

    $sql = "INSERT INTO Student_Login (username_email, password, created_at) VALUES ('$username', '$password', NOW())";

} elseif ($user_type === 'admin') {
    $id_number = $_POST['id-number'];
    $password = $_POST['admin-password'];

    $sql = "INSERT INTO Admin_Login (id_number, password, created_at) VALUES ('$id_number', '$password', NOW())";

} elseif ($user_type === 'therapist') {
    $name = $_POST['name'];
    $contact_no = $_POST['contact-no'];
    $password = $_POST['therapist-password'];

    $sql = "INSERT INTO Therapist_Login (name, password, created_at) VALUES ('$name', '$password', NOW())";
}

// Execute query and handle errors
if ($conn->query($sql) === TRUE) {
    // Redirect to Main-page.html upon successful registration
    header("Location: ../Main-page.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
