<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}

// Fetch students
$students = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
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

        .logout {
            background: #dc3545;
        }
    </style>
</head>

<body>

<h2>👩‍🏫 Welcome, <?= $_SESSION['teacher_name']; ?></h2>

<a class="logout" href="teacher_logout.php">Logout</a>

<h3>📘 Student List</h3>

<table>
    <tr>
        <th>Name</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($students)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['course']); ?></td>
            <td>
                <a href="add_result.php?id=<?= $row['id']; ?>">
                    Add / Update Result
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
