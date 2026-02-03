<?php
session_start();
header('Content-Type: application/json');
 
include "../Model/db.php";
 
if(isset($_POST['add_teacher'])){
 
    // PHP VALIDATION
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $password = $_POST['password'];
 
    if($name=="" || $email=="" || $subject=="" || $password==""){
        echo json_encode(["status"=>"error","message"=>"All fields required"]);
        exit();
    }
 
    
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
 
    
    if(!isset($_FILES['image']) || $_FILES['image']['error'] != 0){
        echo json_encode(["status"=>"error","message"=>"Image upload failed"]);
        exit();
    }
 
    $imgName = time()."_".$_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $path = "../uploads/teachers/".$imgName;
 
    if(!move_uploaded_file($tmp, $path)){
        echo json_encode(["status"=>"error","message"=>"Image move failed"]);
        exit();
    }
 
    
    $stmt = $conn->prepare(
        "INSERT INTO teachers (name,email,subject,password,image)
         VALUES (?,?,?,?,?)"
    );
 
    $stmt->bind_param("sssss", $name, $email, $subject, $hashPass, $imgName);
 
    if($stmt->execute()){
        echo json_encode([
            "status"=>"success",
            "message"=>"Teacher added successfully"
        ]);
    } else {
        echo json_encode([
            "status"=>"error",
            "message"=>"Database error"
        ]);
    }
    exit();
}