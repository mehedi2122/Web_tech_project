<?php
include "../Model/db.php";


/* ADD TEACHER */
if (isset($_POST['add_teacher'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/teachers/".$img);

    mysqli_query($conn, "
        INSERT INTO teachers(name,email,subject,password,image)
        VALUES('$name','$email','$subject','$password','$img')
    ");

    header("Location: ../View/admin/admin_dashboard.php");
}
/* DELETE STUDENT */
if (isset($_GET['delete_student'])) {
    $id = $_GET['delete_student'];
    mysqli_query($conn, "DELETE FROM students WHERE id=$id");
    header("Location: ../View/admin/student_list.php");
}
if (isset($_POST['update_teacher'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    mysqli_query($conn,
        "UPDATE teachers SET 
         name='$name',
         subject='$subject',
         email='$email'
         WHERE id='$id'"
    );

    header("Location: ../View/admin/admin_home.php");
}
/* DELETE TEACHER */
if (isset($_GET['delete_teacher'])) {

    $id = $_GET['delete_teacher'];

    mysqli_query($conn, "DELETE FROM teachers WHERE id='$id'");

    header("Location: ../View/admin/view_teacher.php");
    exit();
}


?>
