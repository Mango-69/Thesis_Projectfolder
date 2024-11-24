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
    $userType = $_POST["user-type"];

    if ($userType === 'student') {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $contactNo = $_POST["contact-no"];
        $dobMonth = $_POST["month"];
        $dobDay = $_POST["day"];
        $dobYear = $_POST["year"];
        $dateOfBirth = "$dobYear-$dobMonth-$dobDay"; // Format date

        // Insert student data into the database
        $stmt = $conn->prepare("INSERT INTO students (email, username, password, address, contact_no, date_of_birth) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $email, $username, $password, $address, $contactNo, $dateOfBirth);
        
    } elseif ($userType === 'admin') {
        $idNumber = $_POST["id-number"];
        $password = $_POST["admin-password"];

        // Insert admin data into the database
        $stmt = $conn->prepare("INSERT INTO admins (id_number, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $idNumber, $password);
        
    } elseif ($userType === 'therapist') {
        $name = $_POST["name"];
        $contactNo = $_POST["contact-no"];
        $password = $_POST["therapist-password"];

        // Insert therapist data into the database
        $stmt = $conn->prepare("INSERT INTO therapists (name, contact_no, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $contactNo, $password);
    }

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>