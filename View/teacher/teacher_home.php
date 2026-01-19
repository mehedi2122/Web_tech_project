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
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<nav>
    <div class="logo">Teacher Panel</div>
    <ul>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<div class="course-detail">
    <h2>Welcome, <?php echo $_SESSION['teacher_name']; ?></h2>
    <p>You are logged in as a teacher.</p>
</div>

</body>
</html>
