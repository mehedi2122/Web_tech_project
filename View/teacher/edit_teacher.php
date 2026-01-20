<?php
include "../../Model/db.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM teachers WHERE id=$id")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
</head>
<body>

<h2>Edit Teacher</h2>

<form action="../../Controller/TeacherController.php" method="POST">

    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <input type="text" name="name" value="<?= $data['name']; ?>" required><br><br>
    <input type="text" name="subject" value="<?= $data['subject']; ?>" required><br><br>
    <input type="email" name="email" value="<?= $data['email']; ?>" required><br><br>

    <button type="submit" name="update_teacher">Update</button>
</form>

</body>
</html>
