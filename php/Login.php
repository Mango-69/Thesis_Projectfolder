<?php
session_start();
require_once 'config.php'; // Include your database configuration file

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userType = $_POST['user-type'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $idNumber = $_POST['id-number'] ?? '';
    $name = $_POST['name'] ?? '';

    // Connect to the database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Query to verify user credentials
    if ($userType === 'student') {
        $sql = "SELECT * FROM students WHERE (email = ? OR username = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
    } elseif ($userType === 'admin') {
        $sql = "SELECT * FROM admins WHERE id_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $idNumber);
    } elseif ($userType === 'therapist') {
        $sql = "SELECT * FROM therapists WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $name);
    } else {
        echo "Invalid user type.";
        exit;
    }

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify the user and password
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_type'] = $userType;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $userType === 'therapist' ? $user['name'] : $user['username'] ?? $user['email'];

        // Redirect to respective landing pages
        if ($userType === 'student') {
            header('Location: Student-landing-page.html');
        } elseif ($userType === 'admin') {
            header('Location: Admin-landing-page.html');
        } elseif ($userType === 'therapist') {
            header('Location: Therapist-landing-page.html');
        }
        exit;
    } else {
        echo "<script>alert('Invalid credentials. Please try again.'); window.location.href = 'Login-page.html';</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
    exit;
}
?>
