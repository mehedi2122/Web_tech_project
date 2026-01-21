<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #4e73df, #1cc88a);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #fff;
            width: 350px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #4e73df;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #2e59d9;
        }

        .back-btn {
            background: #6c757d;
        }

        .remember {
            margin-top: 10px;
            font-size: 14px;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>🎓 Student Login</h2>

    <form method="POST" action="../../Controller/AuthController.php" onsubmit="return validateLogin()">

        <!-- AUTO FILL USERNAME FROM COOKIE -->
        <input type="text" 
               name="username" 
               id="username"
               placeholder="Username"
               value="<?php echo isset($_COOKIE['student_user']) ? $_COOKIE['student_user'] : ''; ?>">

        <input type="password" 
               name="password" 
               id="password"
               placeholder="Password">

        <div class="remember">
            <input type="checkbox" name="remember" checked> Remember Me
        </div>

        <button type="submit" name="student_login">Login</button>

        <!-- BACK BUTTON -->
        <button type="button" class="back-btn" onclick="window.location.href='../../index.php'">
            ⬅ Back to Home
        </button>

    </form>

    <p id="error" class="error"></p>

</div>

<script>
function validateLogin() {
    if (username.value === "" || password.value === "") {
        document.getElementById("error").innerText = "⚠️ All fields are required!";
        return false;
    }
    return true;
}
</script>

</body>
</html>
