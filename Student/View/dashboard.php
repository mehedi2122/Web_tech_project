<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['student_name']; ?></h2>

<ul>
    <li>Profile</li>
    <li>Attendance</li>
    <li>Courses</li>
    <li>Result</li>
    <li><a href="../Controller/logout.php">Logout</a></li>
</ul>
