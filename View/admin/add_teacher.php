<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<h2 style="text-align:center;">Add Teacher</h2>

<form action="../../Controller/AdminController.php" method="POST" enctype="multipart/form-data" style="width:40%;margin:auto;">

    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="text" name="subject" placeholder="Subject" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="file" name="image" required><br><br>

    <button type="submit" name="add_teacher">Add Teacher</button>
</form>

</body>
</html>
