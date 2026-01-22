<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<h2 style="text-align:center;">Student Login</h2>

<form action="../../Controller/AuthController.php" method="POST" style="width:40%; margin:auto;">

    <input type="text" name="username" placeholder="Username" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="student_login">Login</button>

</form>

</body>
</html>
