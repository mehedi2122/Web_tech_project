<?php
session_start();
include "../../Model/db.php";

/* Security Check */
if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}

/* Fetch students */
$students = mysqli_query($conn, "SELECT id, name FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Result</title>

    <style>
        body {
            font-family: Arial;
            background: #f2f4f7;
            padding: 30px;
        }

        .box {
            width: 400px;
            background: white;
            padding: 25px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 12px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>📘 Add Student Result</h2>

    <form action="../../Controller/TeacherController.php" method="POST">

        <label>Student</label>
        <select name="student_id" required>
            <option value="">-- Select Student --</option>
            <?php while($row = mysqli_fetch_assoc($students)) { ?>
                <option value="<?= $row['id']; ?>">
                    <?= $row['name']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Subject</label>
        <input type="text" name="subject" required>

        <label>Marks</label>
        <input type="number" name="marks" required>

        <label>Grade</label>
        <input type="text" name="grade" required>

        <button type="submit" name="add_result">
            Save Result
        </button>

    </form>

</div>

</body>
</html>
