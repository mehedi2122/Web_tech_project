<?php
include "../../Model/db.php";
$res = mysqli_query($conn, "SELECT * FROM students");
?>

<h2>Students</h2>

<table border="1">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
</tr>

<?php while($row = mysqli_fetch_assoc($res)) { ?>
<tr>
    <td><?= $row['name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['course']; ?></td>
</tr>
<td>
    <a href="../../Controller/StudentController.php?delete=<?= $row['id'] ?>"
       onclick="return confirm('Delete this student?')">
       ❌ Delete
    </a>
</td>


<?php } ?>
</table>
