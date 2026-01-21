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
    <title>Upload Document</title>

    <style>
        body {
            font-family: Arial;
            background: #f2f4f7;
            padding: 30px;
        }

        .box {
            width: 420px;
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

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 12px;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background: #1e7e34;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>📂 Upload Student Document</h2>

    <form action="../../Controller/TeacherController.php"
          method="POST"
          enctype="multipart/form-data">

        <label>Student</label>
        <select name="student_id" required>
            <option value="">-- Select Student --</option>
            <?php while($row = mysqli_fetch_assoc($students)) { ?>
                <option value="<?= $row['id']; ?>">
                    <?= $row['name']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Document Title</label>
        <input type="text" name="doc_title" required>

        <label>Description (Optional)</label>
        <textarea name="doc_description" rows="3"></textarea>

        <label>Select Document</label>
        <input type="file" name="document" required>

        <button type="submit" name="upload_document">
            Upload Document
        </button>

    </form>

</div>

</body>
</html>
