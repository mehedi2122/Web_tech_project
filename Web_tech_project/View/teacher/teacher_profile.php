<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}

$id = $_SESSION['teacher_id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM teachers WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Profile</title>
</head>
<body>

<h2>Teacher Profile</h2>

<p><strong>Name:</strong> <?= $data['name']; ?></p>
<p><strong>Email:</strong> <?= $data['email']; ?></p>
<p><strong>Subject:</strong> <?= $data['subject']; ?></p>

<a href="teacher_dashboard.php">Back</a> |
<a href="teacher_logout.php">Logout</a>

</body>
</html>
