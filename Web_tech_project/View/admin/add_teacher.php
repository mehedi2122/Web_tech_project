<!DOCTYPE html>

<html>

<head>

    <title>Add Teacher</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>



<h2>👨‍🏫 Add New Teacher</h2>



<div id="message" style="font-weight: bold; margin-bottom: 10px;"></div>



<form id="addTeacherForm" enctype="multipart/form-data">

    <input type="text" name="name" placeholder="Teacher Name" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="text" name="subject" placeholder="Subject" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <input type="file" name="image" required><br><br>

    

    <input type="hidden" name="add_teacher" value="1">

    <button type="submit">Add Teacher</button>

</form>



<script>

$(document).ready(function() {

    $("#addTeacherForm").on("submit", function(e) {

        e.preventDefault(); 



        var formData = new FormData(this); 


        $.ajax({

            url: "../../Controller/AdminController.php",

            type: "POST",

            data: formData,

            contentType: false,

            processData: false,

            dataType: "json", 

            success: function(response) {

                if(response.status === "success") {

                    $("#message").css("color","green").html(response.message);

                    

                    

                    document.cookie = "teacher_added=" + response.name + "; max-age=3600; path=/";



                    

                    $("#addTeacherForm")[0].reset();

                } else {

                    $("#message").css("color","red").html(response.message);

                }

            },

            error: function(xhr, status, error) {

                $("#message").css("color","red").html("Server Error: " + error);

            }

        });

    });

});

</script>



</body>

</html>
