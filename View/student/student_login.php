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
    </style>
</head>
<body>
 
<div class="login-box">
    <h2>🎓 Student Login</h2>
 
    <form method="POST" action="../../Controller/AuthController.php">
 
        <input type="text" name="username" placeholder="Username" required>
 
        <input type="password" name="password" placeholder="Password" required>
 
        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
 
        <button type="submit" name="student_login">Login</button>
 
        <button type="button" class="back-btn"
            onclick="window.location.href='../../index.php'">
            Back to Home
        </button>
    </form>
</div>
 
</body>
</html>
 