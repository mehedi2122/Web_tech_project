<?php
session_start();
include "../Model/db.php";

/* ========================
   TEACHER LOGIN
======================== */
if (isset($_POST['teacher_login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM teachers WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['teacher_id'] = $row['id'];
            $_SESSION['teacher_name'] = $row['name'];

            header("Location: ../View/teacher/teacher_home.php");
            exit();
        } else {
            echo "<script>alert('Wrong Password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Teacher Not Found'); window.history.back();</script>";
    }
}


/* ========================
   DELETE TEACHER
======================== */
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM teachers WHERE id=$id");

    header("Location: ../View/teacher/teacher_list.php");
    exit();
}


/* ========================
   UPDATE TEACHER
======================== */
if (isset($_POST['update_teacher'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    mysqli_query($conn, "
        UPDATE teachers SET 
        name='$name',
        subject='$subject',
        email='$email'
        WHERE id='$id'
    ");

    header("Location: ../View/teacher/teacher_list.php");
    exit();
}
/* ADD RESULT */
/* ADD RESULT */
if (isset($_POST['add_result'])) {

    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];

    $query = "INSERT INTO results 
              (student_id, subject, marks, grade)
              VALUES ('$student_id', '$subject', '$marks', '$grade')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Result Added Successfully!');
            window.location.href='../View/teacher/teacher_dashboard.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
