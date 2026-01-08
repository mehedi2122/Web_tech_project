<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="../images/login_back.avif" class="body_deg">
     
    <center>
        <div class="form_deg">
            <a href="index.php" class="adm_back">Back to Home</a>
            <center class="title_deg">Login Form

            
            </center>
            <form action="student_dashboard.php" method="post" class="log_form">
                
                <div>
                    <label class="label_deg">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label_deg">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input class="login_sub" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </center>
</body>
</html>