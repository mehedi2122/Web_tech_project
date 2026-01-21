<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Notice</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f4f7;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        input, textarea {
            width: 60%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
        }

        button {
            padding: 8px 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
        }

        a {
            text-decoration: none;
            padding: 6px 10px;
            background: #28a745;
            color: white;
            border-radius: 4px;
        }
    </style>
</head>

<body>

<h2>📢 Add Notice</h2>

<form action="../../Controller/TeacherController.php" method="POST">

    <label>Title</label><br>
    <input type="text" name="title" required><br>

    <label>Message</label><br>
    <textarea name="message" rows="5" required></textarea><br>

    <button type="submit" name="add_notice">Publish Notice</button>

</form>

<br><br>

<a href="teacher_dashboard.php">Back</a>

</body>
</html>
