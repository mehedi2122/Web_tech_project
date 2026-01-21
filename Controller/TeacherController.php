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

/* DOCUMENT UPLOAD */
if (isset($_POST['upload_document'])) {

    $student_id = $_POST['student_id'];
    $title = $_POST['doc_title'];
    $description = $_POST['doc_description'];

    $fileName = $_FILES['document']['name'];
    $tmpName = $_FILES['document']['tmp_name'];
    $error = $_FILES['document']['error'];

    if ($error == 0) {

        $newFileName = time() . "_" . $fileName;
        $uploadPath = "../uploads/" . $newFileName;

        if (move_uploaded_file($tmpName, $uploadPath)) {

            $query = "INSERT INTO documents 
                      (student_id, title, description, file_name)
                      VALUES ('$student_id', '$title', '$description', '$newFileName')";

            if (mysqli_query($conn, $query)) {
                echo "<script>
                    alert('Document Uploaded Successfully!');
                    window.location.href='../View/teacher/teacher_dashboard.php';
                </script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }

        } else {
            echo "<script>alert('Upload Failed!'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('File Error!'); window.history.back();</script>";
    }
}

/* ADD NOTICE */
if (isset($_POST['add_notice'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);


    $query = "INSERT INTO notices 
              (title, message)
              VALUES ('$title', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Notice Published Successfully!');
            window.location.href='../View/teacher/view_notice.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

/* DELETE NOTICE */
if (isset($_GET['delete_notice'])) {

    $id = $_GET['delete_notice'];
    mysqli_query($conn, "DELETE FROM notices WHERE id=$id");

    header("Location: ../View/teacher/view_notice.php");
    exit();
}
?>
