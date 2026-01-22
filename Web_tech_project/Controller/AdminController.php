<?php

session_start();

include "../Model/db.php";





if (isset($_POST['add_teacher'])) {



    $name = $_POST['name'];

    $email = $_POST['email'];

    $subject = $_POST['subject'];

    

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);



    

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $img = $_FILES['image']['name'];

        $tmp_name = $_FILES['image']['tmp_name'];



        if (!move_uploaded_file($tmp_name, "../uploads/teachers/".$img)) {

            echo json_encode(["status" => "error", "message" => "Image upload failed"]);

            exit();

        }

    } else {

        echo json_encode(["status" => "error", "message" => "No image uploaded"]);

        exit();

    }



    

    $query = mysqli_query($conn, "INSERT INTO teachers(name,email,subject,password,image) VALUES('$name','$email','$subject','$password','$img')");



    if ($query) {

        

        setcookie("teacher_added", $name, time() + 3600, "/");



        

        echo json_encode([

            "status" => "success", 

            "message" => "Teacher '$name' added successfully!", 

            "name" => $name

        ]);

    } else {

        echo json_encode(["status" => "error", "message" => "Database Error: " . mysqli_error($conn)]);

    }

    exit();

}





