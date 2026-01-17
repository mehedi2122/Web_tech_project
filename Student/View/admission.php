<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="../images/login_back.avif" class="body_deg">

   <form action="../Controller/admission_process.php" method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required>  <br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <input type="text" name="username" placeholder="Username" required><br>         
    <input type="password" name="password" placeholder="Password" required> <br>
    <input type="text" name="course" placeholder="Course" required>
    <button type="submit">Submit</button>
</form>

</body>
</html>
