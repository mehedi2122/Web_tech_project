<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['student_name']; ?> 🎓</h2>

<ul>
    <li><a href="student_profile.php">My Profile</a></li>
    <li><a href="student_logout.php">Logout</a></li>
</ul>

</body>
</html>
