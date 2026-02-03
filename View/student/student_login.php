<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>

    <style>
        body {
            font-family: Arial;
            background: linear-gradient(120deg,#4e73df,#1cc88a);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .login-box {
            background:white;
            padding:30px;
            width:350px;
            border-radius:8px;
            box-shadow:0 0 15px rgba(0,0,0,.2);
        }
        input,button {
            width:100%;
            padding:10px;
            margin-top:10px;
        }
        button {
            background:#4e73df;
            color:white;
            border:none;
            cursor:pointer;
        }
        .back-btn {
            background:#6c757d;
        }
        .error {
            color:red;
            margin-top:10px;
        }
    </style>

    <script>
        function studentLogin() {

            let username = document.getElementById("username").value.trim();
            let password = document.getElementById("password").value.trim();
            let remember = document.getElementById("remember").checked;
            let errorBox = document.getElementById("error");

            if (username === "" || password === "") {
                errorBox.innerHTML = "❌ All fields are required!";
                return false;
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../Controller/AuthController.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {

                    if (this.responseText.trim() === "success") {
                        window.location.href = "student_dashboard.php";
                    } else {
                        errorBox.innerHTML = this.responseText;
                    }
                }
            };

            xhr.send(
                "student_login=1" +
                "&username=" + encodeURIComponent(username) +
                "&password=" + encodeURIComponent(password) +
                "&remember=" + remember
            );

            return false;
        }
    </script>
</head>

<body>

<div class="login-box">
    <h2>🎓 Student Login</h2>

    <form onsubmit="return studentLogin();">

        <input type="text" id="username"
               placeholder="Username or Email"
               value="<?php echo isset($_COOKIE['student_user']) ? $_COOKIE['student_user'] : ''; ?>">

        <input type="password" id="password" placeholder="Password">

        <label>
            <input type="checkbox" id="remember"
            <?php if(isset($_COOKIE['student_user'])) echo "checked"; ?>>
            Remember Me
        </label>

        <button type="submit">Login</button>

        <button type="button" class="back-btn"
            onclick="window.location.href='../../index.php'">
            Back to Home
        </button>

        <p id="error" class="error"></p>
    </form>
</div>

</body>
</html>
