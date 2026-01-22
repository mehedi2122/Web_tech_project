<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}

$id = $_SESSION['student_id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<h2 style="text-align:center;">Student Profile</h2>

<div style="width:40%; margin:auto; border:1px solid #ccc; padding:20px;">
    <p><strong>Name:</strong> <?= $student['name']; ?></p>
    <p><strong>Email:</strong> <?= $student['email']; ?></p>
    <p><strong>Phone:</strong> <?= $student['phone']; ?></p>
    <p><strong>Username:</strong> <?= $student['username']; ?></p>
    <p><strong>Course:</strong> <?= $student['course']; ?></p>

    <br>
    <a href="student_dashboard.php">⬅ Back</a> |
    <a href="student_logout.php">Logout</a>
</div>

</body>
</html>
