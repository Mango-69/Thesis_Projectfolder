<?php
// Database connection parameters
$dbhost = "localhost";
$dbname = "thesis_project";
$dbuser = "root";
$dbpass = "";
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>