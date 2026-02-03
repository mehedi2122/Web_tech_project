<!DOCTYPE html>
<html>
<head>
<title>Add Teacher</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
 
<h2>👨‍🏫 Add New Teacher</h2>
 
<div id="message" style="font-weight:bold; margin-bottom:10px;"></div>
 
<form id="addTeacherForm" enctype="multipart/form-data">
<input type="text" name="name" placeholder="Teacher Name"><br><br>
<input type="email" name="email" placeholder="Email"><br><br>
<input type="text" name="subject" placeholder="Subject"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<input type="file" name="image"><br><br>
 
    <input type="hidden" name="add_teacher" value="1">
<button type="submit">Add Teacher</button>
</form>
 
<script>
$(document).ready(function(){
 
    $("#addTeacherForm").on("submit", function(e){
        e.preventDefault();
 
        //JS VALIDATION
        var name = $("input[name='name']").val().trim();
        var email = $("input[name='email']").val().trim();
        var subject = $("input[name='subject']").val().trim();
        var password = $("input[name='password']").val();
        var image = $("input[name='image']")[0].files[0];
 
        if(name === ""){
            $("#message").css("color","red").html("Name required");
            return;
        }
 
        if(email === ""){
            $("#message").css("color","red").html("Email required");
            return;
        }
 
        if(subject === ""){
            $("#message").css("color","red").html("Subject required");
            return;
        }
 
        if(password.length < 6){
            $("#message").css("color","red").html("Password minimum 6 characters");
            return;
        }
 
        if(!image){
            $("#message").css("color","red").html("Image required");
            return;
        }
 
        //  AJAX
        var formData = new FormData(this);
 
        $.ajax({
            url: "../../Controller/AdminController.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
 
            success: function(response){
                if(response.status === "success"){
                    $("#message").css("color","green").html(response.message);
                    $("#addTeacherForm")[0].reset();
                } else {
                    $("#message").css("color","red").html(response.message);
                }
            },
 
            error: function(){
                $("#message").css("color","red").html("AJAX Error");
            }
        });
    });
});
</script>
 
</body>
</html>