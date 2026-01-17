<?php
include "../Model/db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$course = $_POST['course'];

$sql = "INSERT INTO students (name, email, password, course)
        VALUES ('$name', '$email', '$password', '$course')";

if (mysqli_query($conn, $sql)) {
    echo "Admission Successful <br>";
    echo "<a href='../View/login.php'>Login Now</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
