<?php

session_start();
if (isset($_SESSION['username'] )) {
    $username = $_SESSION['username'];
} else {
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin home</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>

    <a href="logout.php">logout</a><br>
</body>
</html>