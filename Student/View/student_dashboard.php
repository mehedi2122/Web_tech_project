<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="../images/student_dash.jpg" class="body_deg">

    <?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['student_name']; ?></h2>

<ul>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Attendance</a></li>
    <li><a href="#">Courses</a></li>
    <li><a href="#">Result</a></li>
    <li><a href="../Controller/logout.php">Logout</a></li>
</ul>

</body>
</html>
