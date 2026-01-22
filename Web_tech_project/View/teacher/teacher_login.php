<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<h2 style="text-align:center;">Teacher Login</h2>

<form action="../../Controller/AuthController.php" method="POST" style="width:40%; margin:auto;">

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="teacher_login">Login</button>

</form>

</body>
</html>
