<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
</head>
<body>

<h2>Add Teacher</h2>

<form action="admin_add_teacher_process.php" method="POST" enctype="multipart/form-data">


    <label>Teacher Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Subject</label><br>
    <input type="text" name="subject" required><br><br>

    <label>Photo</label><br>
    <input type="file" name="image" required><br><br>

    <input type="submit" name="submit" value="Add Teacher">

</form>

</body>
</html>
