<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

/* Counts */
$students = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students"));
$teachers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM teachers"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f4f7;
            padding: 30px;
        }

        .box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            margin: auto;
        }

        .menu a {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }

        .menu a:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="box">

<h2>👨‍💼 Admin Dashboard</h2>

<p>👨‍🎓 Students: <b><?= $students ?></b></p>
<p>👩‍🏫 Teachers: <b><?= $teachers ?></b></p>

<hr>

<div class="menu">
    <a href="add_teacher.php">➕ Add Teacher</a>
    <a href="view_teacher.php">👩‍🏫 View Teachers</a>
    <a href="../student/student_list.php">👨‍🎓 View Students</a>
    <a href="logout.php">🚪 Logout</a>
</div>

</div>
<br><br>
<a href="../../index.php">⬅ Back to Home</a>
</body>
</html>
