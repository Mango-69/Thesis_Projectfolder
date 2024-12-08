<?php
// Start session
session_start();

session_unset();

// Destroy all sessions
session_destroy();

// Redirect to Main-page.html (one level up)
header("Location: ../Main-page.html");
exit;
?>
