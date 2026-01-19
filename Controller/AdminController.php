<?php
include "../Model/db.php";

/* ADD TEACHER */
if (isset($_POST['add_teacher'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/teachers/".$image);

    $sql = "INSERT INTO teachers 
            (name, subject, email, password, image)
            VALUES ('$name','$subject','$email','$password','$image')";

    mysqli_query($conn, $sql);

    header("Location: ../View/admin/admin_home.php");
}

/* DELETE TEACHER */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM teachers WHERE id='$id'";
    mysqli_query($conn, $sql);

    header("Location: ../View/admin/admin_home.php");
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

?>
