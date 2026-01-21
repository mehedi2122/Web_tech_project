<?php
include "../Model/db.php";

if (isset($_POST['name'])) {

    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $course   = trim($_POST['course']);

    // PHP Validation
    if ($name == "" || $email == "" || $phone == "" || $username == "" || $password == "" || $course == "") {
        echo json_encode([
            "status" => "error",
            "message" => "❌ All fields are required"
        ]);
        exit();
    }

    // Security
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $username = mysqli_real_escape_string($conn, $username);
    $course = mysqli_real_escape_string($conn, $course);

    // DUPLICATE CHECK
    $check = mysqli_query($conn, "SELECT id FROM students WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo json_encode([
            "status" => "error",
            "message" => "❌ Username or Email already exists"
        ]);
        exit();
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "
        INSERT INTO students (name,email,phone,username,password,course)
        VALUES ('$name','$email','$phone','$username','$password','$course')
    ");

    echo json_encode([
        "status" => "success",
        "message" => "✅ Admission Successful! Redirecting..."
    ]);
}




/* DELETE STUDENT */
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    // First delete related results
    mysqli_query($conn, "DELETE FROM results WHERE student_id = '$id'");

    // Then delete student
    mysqli_query($conn, "DELETE FROM students WHERE id = '$id'");

    echo "
    <script>
        alert('✅ Student deleted successfully');
        window.location.href = '../View/student/student_list.php';
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
