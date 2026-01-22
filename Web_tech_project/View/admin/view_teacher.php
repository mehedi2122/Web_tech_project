<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM teachers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Teachers</title>
    <style>
        table { width: 80%; border-collapse: collapse; margin: auto; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background: #ddd; }
    </style>
</head>
<body>

<h2 align="center">👨‍🏫 Teacher List</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['subject'] ?></td>
            <td>
                <a href="../../Controller/AdminController.php?delete_teacher=<?= $row['id'] ?>"
                   onclick="return confirm('Delete this teacher?')">❌ Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<br>
<center><a href="admin_dashboard.php">⬅ Back</a></center>

</body>
</html>
