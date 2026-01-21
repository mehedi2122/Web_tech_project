<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

/* Fetch student results */
$resultQuery = mysqli_query($conn,
    "SELECT * FROM results WHERE student_id = '$student_id'"
);

/* Fetch student documents */
$docQuery = mysqli_query($conn,
    "SELECT * FROM documents WHERE student_id = '$student_id' ORDER BY uploaded_at DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            width: 75%;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
        }

        .section {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

<div class="dashboard">

    <h2>🎓 Welcome, <?php echo htmlspecialchars($_SESSION['student_name']); ?></h2>

    <!-- ACTIONS -->
    <div class="section">
        <a class="btn" href="student_profile.php">👤 My Profile</a>
        <a class="btn btn-danger" href="student_logout.php">🚪 Logout</a>
    </div>

    <!-- RESULTS -->
    <div class="section">
        <h3>📊 My Results</h3>

        <table>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
                <th>Grade</th>
            </tr>

            <?php if (mysqli_num_rows($resultQuery) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($resultQuery)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['subject']) ?></td>
                        <td><?= $row['marks'] ?></td>
                        <td><?= $row['grade'] ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="3">No results published yet.</td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <!-- DOCUMENTS -->
    <div class="section">
        <h3>📄 My Documents</h3>

        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>File</th>
            </tr>

            <?php if (mysqli_num_rows($docQuery) > 0) { ?>
                <?php while ($doc = mysqli_fetch_assoc($docQuery)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($doc['title']) ?></td>
                        <td><?= htmlspecialchars($doc['description']) ?></td>
                        <td>
                            <a class="btn" href="../../uploads/<?= $doc['file_name'] ?>" target="_blank">
                                View / Download
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="3">No documents uploaded yet.</td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <!-- CLASS ACTIVITY -->
    <div class="section">
        <h3>📚 Class Activities</h3>

        <table>
            <tr>
                <th>Date</th>
                <th>Activity</th>
                <th>Status</th>
            </tr>

            <tr>
                <td>2026-01-10</td>
                <td>Assignment 1</td>
                <td>Completed</td>
            </tr>

            <tr>
                <td>2026-01-15</td>
                <td>Quiz - ML</td>
                <td>Pending</td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>
