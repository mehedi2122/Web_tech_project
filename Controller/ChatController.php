<?php
session_start();
include "../Model/db.php";

/* SEND MESSAGE */
if (isset($_POST['send_message'])) {

    $teacher_id = $_POST['teacher_id'];
    $student_id = $_POST['student_id'];
    $message = $_POST['message'];
    $sender_role = $_POST['sender_role'];

    if ($sender_role == "teacher") {
        if (!isset($_SESSION['teacher_id'])) exit();
        $sender = "teacher";
    } else if ($sender_role == "student") {
        if (!isset($_SESSION['student_id'])) exit();
        $sender = "student";
    } else {
        exit();
    }

    mysqli_query($conn, "INSERT INTO chat (teacher_id, student_id, sender, message)
                         VALUES ('$teacher_id', '$student_id', '$sender', '$message')");

    exit();
}


/* FETCH MESSAGES */
if (isset($_GET['fetch_chat'])) {

    $teacher_id = $_GET['teacher_id'];
    $student_id = $_GET['student_id'];

    $res = mysqli_query($conn,
        "SELECT * FROM chat 
         WHERE teacher_id='$teacher_id' AND student_id='$student_id'
         ORDER BY id ASC"
    );

    while ($row = mysqli_fetch_assoc($res)) {
        echo "<p><b>" . htmlspecialchars($row['sender']) . ":</b> " . htmlspecialchars($row['message']) . "</p>";
    }

    exit();
}
?>
