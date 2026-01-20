<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
</head>
<body>

<h2>Add Teacher</h2>

<form action="../../Controller/AdminController.php" method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Teacher Name" required><br><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="text" name="subject" placeholder="Subject" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<input type="file" name="image" required><br><br>

<button type="submit" name="add_teacher">Add Teacher</button>
</form>


</body>
</html>
