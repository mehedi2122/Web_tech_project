<?php
$host = "localhost";
$user = "root";
$password = ""; // Default XAMPP password; if you're using a different setup, modify
$db = "student_management";

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>