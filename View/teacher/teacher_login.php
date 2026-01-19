<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<div class="course-detail">
    <h2>Teacher Login</h2>

    <form action="../../Controller/TeacherController.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>

        <button type="submit" name="teacher_login">Login</button>
    </form>
</div>

</body>
</html>
