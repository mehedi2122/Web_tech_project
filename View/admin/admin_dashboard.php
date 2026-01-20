<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$students = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students"));
$teachers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM teachers"));
?>

<h2>Admin Dashboard</h2>

<p>👨‍🎓 Students: <?= $students ?></p>
<p>👩‍🏫 Teachers: <?= $teachers ?></p>

<hr>

<a href="add_teacher.php">Add Teacher</a><br>
<a href="../student/student_list.php">View Students</a><br>
<a href="logout.php">Logout</a>
