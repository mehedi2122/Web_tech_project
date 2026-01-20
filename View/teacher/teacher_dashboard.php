<?php
session_start();

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['teacher_name']; ?> 👩‍🏫</h2>

<ul>
    <li><a href="teacher_profile.php">My Profile</a></li>
    <li><a href="teacher_logout.php">Logout</a></li>
</ul>

</body>
</html>
