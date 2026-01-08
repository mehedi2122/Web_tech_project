<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="login_back.avif" class="body_deg">
    <center>
        <div class="form_deg">
            <center class="title_deg">Login Form

                <h4>
                    <?php
                   error_reporting(0);
                   session_start();
                   session_destroy();
                        echo $_SESSION['loginMessage'];
                       
                
                    ?>
                </h4>
            </center>
            <form action="Login_check.php" method="post" class="log_form">
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