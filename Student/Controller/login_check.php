<?php
session_start();
include "../Model/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM students WHERE email='$email'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {

        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_name'] = $row['name'];

        header("Location: ../View/dashboard.php");

    } else {
        echo "Wrong Password";
    }

} else {
    echo "User not found";
}
?>
