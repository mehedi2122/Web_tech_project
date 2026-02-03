<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
 
<h2 style="text-align:center;">Teacher Login</h2>
 
<form action="../../Controller/AuthController.php"
      method="POST"
      style="width:40%; margin:auto;"
      onsubmit="return validateTeacherLogin();">
 
    <input type="email" name="email" id="email" placeholder="Email" required><br><br>
 
    <input type="password" name="password" id="password" placeholder="Password" required><br><br>
 
    <button type="submit" name="teacher_login">Login</button>
 
</form>
 
<!-- ✅ JS VALIDATION -->
<script>
function validateTeacherLogin() {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
 
    if (email === "" || password === "") {
        alert("All fields are required!");
        return false;
    }
 
    if (!email.includes("@")) {
        alert("Please enter a valid email address!");
        return false;
    }
 
    if (password.length < 5) {
        alert("Password must be at least 6 characters!");
        return false;
    }
 
    return true;
}
</script>
 
</body>
</html>
 
 