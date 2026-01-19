<?php
include "../../Model/db.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM teachers WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
</head>
<body>

<h2>Edit Teacher</h2>

<form action="../../Controller/AdminController.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <input type="text" name="name" value="<?php echo $data['name']; ?>"><br><br>
    <input type="text" name="subject" value="<?php echo $data['subject']; ?>"><br><br>
    <input type="email" name="email" value="<?php echo $data['email']; ?>"><br><br>

    <button type="submit" name="update_teacher">Update</button>
</form>

</body>
</html>
