<?php
include "../Model/db.php";

/* ADD STUDENT */
if (isset($_POST['add_student'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $course = $_POST['course'];

    mysqli_query($conn, "
        INSERT INTO students (name,email,phone,username,password,course)
        VALUES ('$name','$email','$phone','$username','$password','$course')
    ");

    echo "
<script>
    alert('✅ Admission Successful! Please login now.');
    window.location.href = '../View/student/student_login.php';
</script>
";
exit();

}

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    // 1️⃣ Delete student results first
    mysqli_query($conn, "DELETE FROM results WHERE student_id = '$id'");

    // 2️⃣ Then delete student
    mysqli_query($conn, "DELETE FROM students WHERE id = '$id'");

    echo "
<script>
    alert('✅ Admission Successful! Please login now.');
    window.location.href = '../View/student/student_login.php';
</script>
";
exit();

}


/* UPDATE */
if (isset($_POST['update_student'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    mysqli_query($conn, "
        UPDATE students SET 
        name='$name',
        email='$email',
        phone='$phone',
        course='$course'
        WHERE id='$id'
    ");

    echo "
<script>
    alert('✅ Admission Successful! Please login now.');
    window.location.href = '../View/student/student_login.php';
</script>
";
exit();

}
?>
