<?php
include "../Model/db.php";

if (isset($_POST['name'])) {

    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $course   = trim($_POST['course']);

    

    if ($name == "" || $email == "" || $phone == "" || 
        $username == "" || $password == "" || $course == "") {

        echo json_encode([
            "status" => "error",
            "message" => "All fields are required!"
        ]);
        exit();
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid email format!"
        ]);
        exit();
    }

    
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo json_encode([
            "status" => "error",
            "message" => "Phone number must be 10 digits!"
        ]);
        exit();
    }

   
    if (strlen($password) < 5) {
        echo json_encode([
            "status" => "error",
            "message" => "Password must be at least 5 characters!"
        ]);
        exit();
    }

    $stmt = $conn->prepare(
        "INSERT INTO students (name,email,phone,username,password,course)
         VALUES (?,?,?,?,?,?)"
    );
    $stmt->bind_param(
        "ssssss",
        $name,
        $email,
        $phone,
        $username,
        $password,
        $course
    );

    $stmt->execute();

    echo json_encode([
        "status" => "success",
        "message" => "Admission Successful!"
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
