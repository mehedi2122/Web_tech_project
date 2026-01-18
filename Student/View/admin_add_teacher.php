<?php
include "../model/db.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];

    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $folder = "../uploads/teachers/";
    move_uploaded_file($tmp_name, $folder . $image_name);

    $sql = "INSERT INTO teachers (name, subject, image)
            VALUES ('$name', '$subject', '$image_name')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Teacher Added Successfully');
                window.location='admin_home.php';
              </script>";
    } else {
        echo "DB Error";
    }
}
?>
