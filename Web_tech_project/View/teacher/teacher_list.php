<?php
include "../../Model/db.php";
?>

<h2>Teacher List</h2>

<table border="1" width="90%">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Subject</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php
$res = mysqli_query($conn, "SELECT * FROM teachers");
while ($row = mysqli_fetch_assoc($res)) {
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['subject'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="edit_teacher.php?id=<?= $row['id'] ?>">✏ Edit</a> |
        <a href="../../Controller/TeacherController.php?delete=<?= $row['id'] ?>"
           onclick="return confirm('Delete this teacher?')">❌ Delete</a>
    </td>
</tr>
<?php } ?>
</table>
