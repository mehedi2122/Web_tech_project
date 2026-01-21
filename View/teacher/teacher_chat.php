<?php
session_start();
include "../../Model/db.php";

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}

$teacher_id = $_SESSION['teacher_id'];
$student_id = $_GET['student_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>

<h2>Teacher Chat</h2>

<div id="chatBox" style="width:500px;height:300px;border:1px solid #ccc;overflow:auto;padding:10px;"></div>

<br>

<input type="text" id="msg" style="width:400px;">
<button onclick="sendMessage()">Send</button>

<script>
function loadChat() {
    fetch("../../Controller/ChatController.php?fetch_chat=1&teacher_id=<?= $teacher_id ?>&student_id=<?= $student_id ?>")
        .then(res => res.text())
        .then(data => {
            document.getElementById("chatBox").innerHTML = data;
        });
}

function sendMessage() {
    let msg = document.getElementById("msg").value;
    if (msg.trim() === "") return;

    let formData = new FormData();
    formData.append("send_message", "1");
    formData.append("sender_role", "teacher");
    formData.append("teacher_id", "<?= $teacher_id ?>");
    formData.append("student_id", "<?= $student_id ?>");
    formData.append("message", msg);

    fetch("../../Controller/ChatController.php", {
        method: "POST",
        body: formData
    }).then(() => {
        document.getElementById("msg").value = "";
        loadChat();
    });
}

setInterval(loadChat, 2000);
loadChat();
</script>

</body>
</html>
