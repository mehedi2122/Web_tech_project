<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}

$notices = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Notices</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f4f7;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        a {
            text-decoration: none;
            padding: 6px 10px;
            background: #28a745;
            color: white;
            border-radius: 4px;
        }

        .delete {
            background: #dc3545;
        }
    </style>
</head>

<body>

<h2>📢 All Notices</h2>

<table>
    <tr>
        <th>Title</th>
        <th>Message</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($notices)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['title']); ?></td>
            <td><?= htmlspecialchars($row['message']); ?></td>
            <td>
                <a class="delete" href="../../Controller/TeacherController.php?delete_notice=<?= $row['id']; ?>"
                   onclick="return confirm('Delete this notice?')">
                    Delete
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<br><br>

<a href="teacher_dashboard.php">Back</a>

</body>
</html>
