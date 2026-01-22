<?php
include "../../Model/db.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form action="../../Controller/StudentController.php" method="POST">

<input type="hidden" name="id" value="<?= $data['id']; ?>">

<input type="text" name="name" value="<?= $data['name']; ?>"><br><br>
<input type="email" name="email" value="<?= $data['email']; ?>"><br><br>
<input type="text" name="phone" value="<?= $data['phone']; ?>"><br><br>
<input type="text" name="course" value="<?= $data['course']; ?>"><br><br>

<button type="submit" name="update_student">Update</button>

</form>

</body>
</html>
