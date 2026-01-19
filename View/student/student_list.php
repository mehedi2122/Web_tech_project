<?php
include "../../Model/db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

<h2 style="text-align:center;">Student List</h2>

<table border="1" width="90%" align="center">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
$res = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($res)) {
?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['phone']; ?></td>
    <td><?= $row['course']; ?></td>
    <td>
        <a href="edit_student.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="../../Controller/StudentController.php?delete=<?= $row['id']; ?>"
           onclick="return confirm('Delete student?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
