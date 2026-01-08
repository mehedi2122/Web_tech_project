<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="../images/login_back.avif" class="body_deg">

    <center>
        
        <div class="form_deg">
            <a href="index.php" class="adm_back">Back to Home</a>
            <center class="title_deg">Admission Form</center>

            <form action="signup_submit.php" method="post" class="log_form">

                <div>
                    <label class="label_deg">Name</label>
                    <input type="text" name="name" required>
                </div>

                <div>
                    <label class="label_deg">Email</label>
                    <input type="email" name="email" required>
                </div>

                <div>
                    <label class="label_deg">Password</label>
                    <input type="password" name="password" required>
                </div>

                <div>
                    <label class="label_deg">Phone</label>
                    <input type="text" name="phone" required>
                </div>

                <div>
                    <label class="label_deg">Course</label>
                    <select name="course" required>
                        <option value="Data Science">Data Science</option>
                        <option value="Machine Learning">Machine Learning</option>
                        <option value="Computer Vision">Computer Vision</option>
                    </select>
                </div>

                <div>
                    <input class="login_sub" type="submit" name="submit" value="Submit">
                </div>

            </form>

            <br>
        </div>
    </center>

</body>
</html>
