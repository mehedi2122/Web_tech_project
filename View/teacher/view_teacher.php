<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$teachers = mysqli_query($conn, "SELECT * FROM teachers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher List</title>
    <style>
        body { font-family: Arial; padding: 30px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #000; padding: 10px; text-align: center; }
        th { background: #eee; }
        a { color: red; text-decoration: none; }
    </style>
</head>
<body>

<h2 style="text-align:center;">👩‍🏫 Teacher List</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($teachers)) { ?>
    <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['subject'] ?></td>
        <td>
            <a href="../../Controller/AdminController.php?delete_teacher=<?= $row['id'] ?>"
               onclick="return confirm('Delete this teacher?')">
               ❌ Delete
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
