<?php
include "../../Model/db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<nav>
    <div class="logo">Admin Panel</div>
    <ul>
        <li><a href="add_teacher.php">Add Teacher</a></li>
        <li><a href="../../index.php">Home</a></li>
    </ul>
</nav>

<h2 style="text-align:center;margin-top:20px;">Teachers List</h2>

<table border="1" width="90%" align="center" cellpadding="10">
    <tr style="background:#2c3e50;color:white;">
        <th>ID</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Email</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

<?php
$sql = "SELECT * FROM teachers";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['subject']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td>
        <img src="../../uploads/teachers/<?php echo $row['image']; ?>" width="60">
    </td>
    <td>
        <a href="edit_teacher.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="../../Controller/AdminController.php?delete=<?php echo $row['id']; ?>"
           onclick="return confirm('Delete this teacher?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
