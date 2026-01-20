<!DOCTYPE html>
<html>
<head>
    <title>Student Admission</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Student Admission Form</h2>

<form action="../Controller/StudentController.php" method="POST">

    <input type="text" name="name" placeholder="Full Name" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="text" name="phone" placeholder="Phone" required><br><br>

    <input type="text" name="username" placeholder="Username" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <select name="course" required>
        <option value="">-- Select Course --</option>
        <option value="Computer Vision">Computer Vision</option>
        <option value="Machine Learning">Machine Learning</option>
        <option value="Data Science">Data Science</option>
    </select><br><br>

    <button type="submit" name="admit_student">Submit</button>

</form>

</body>
</html>
