<?php
session_start();
include "../Model/db.php";

if (isset($_POST['student_login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $remember = $_POST['remember'];

    $query = mysqli_query($conn,
        "SELECT * FROM students WHERE username='$username' OR email='$username'"
    );

    if (mysqli_num_rows($query) == 1) {

        $row = mysqli_fetch_assoc($query);

      
        if ($password === $row['password']) {

            $_SESSION['student_id'] = $row['id'];
            $_SESSION['student_name'] = $row['name'];

 
            if ($remember == "true") {
                setcookie("student_user", $username, time() + (86400 * 7), "/"); // 7 days
            } else {
                setcookie("student_user", "", time() - 3600, "/");
            }

            echo "success";
            exit();
        }
    }

    echo "❌ Invalid Username or Password";
    exit();
}







/* =====================
   TEACHER LOGIN
===================== */
if (isset($_POST['teacher_login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM teachers WHERE email='$email'"
    );

    if (mysqli_num_rows($query) == 1) {

        $row = mysqli_fetch_assoc($query);

        if (password_verify($password, $row['password'])) {

            $_SESSION['teacher_id'] = $row['id'];
            $_SESSION['teacher_name'] = $row['name'];

            header("Location: ../View/teacher/teacher_dashboard.php");
            exit();
        }
    }

    echo "<script>
        alert('Invalid Teacher Login');
        window.history.back();
    </script>";
}


/* =====================
   ADMIN LOGIN (NO DB)
===================== */
if (isset($_POST['admin_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hard-coded admin
    if ($username === "admin" && $password === "admin123") {

        $_SESSION['admin'] = "admin";

        header("Location: ../View/admin/admin_dashboard.php");
        exit();

    } else {
        echo "<script>
            alert('Invalid Admin Login');
            window.history.back();
        </script>";
    }
}
?>
