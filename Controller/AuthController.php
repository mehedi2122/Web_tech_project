<?php
session_start();
include "../Model/db.php";

/* STUDENT LOGIN */
if (isset($_POST['student_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['student_id'] = $row['id'];
            $_SESSION['student_name'] = $row['name'];

            header("Location: ../View/student/student_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Wrong Password'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('User Not Found'); window.history.back();</script>";
    }
}
/* TEACHER LOGIN */
if (isset($_POST['teacher_login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM teachers WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['teacher_id'] = $row['id'];
            $_SESSION['teacher_name'] = $row['name'];

            header("Location: ../View/teacher/teacher_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Wrong Password'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Teacher Not Found'); window.history.back();</script>";
    }
}
/* ADMIN LOGIN */
if (isset($_POST['admin_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ✅ HARD-CODED ADMIN LOGIN
    $admin_username = "admin";
    $admin_password = "admin123";

    if ($username === $admin_username && $password === $admin_password) {

        $_SESSION['admin'] = $admin_username;

        header("Location: ../View/admin/admin_dashboard.php");
        exit();

    } else {
        echo "<script>
            alert('Invalid Username or Password');
            window.history.back();
        </script>";
    }
}



?>
