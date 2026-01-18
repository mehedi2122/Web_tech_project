
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <label class="logo">W-school</label>
    
    <ul>
        <li><a href="">teacher</a></li>
        <li><a href="admin_home.php" class="btn_admin">Admin</a></li>
        <li><a href="admission.php" class="btn_admission">Admission</a></li>
        <li><a href="login.php" class="btn_login">Login</a></li>
    </ul></nav>
    <div class="section_1">
        <label class ="img_text">We teach student with care</label>
        <img class="main_img" src="../images/img_2.jpg">    
        </div>
        <div class="container">
            
                     <img class="welcome_img" src="../images/img_3.jfif"> 
                    <div class="welcome_text">
                     <h1>Welcome to W-school</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
</div>
<center>
    <h1>Our Teachers</h1>
</center>
<section class="teachers">

    <div class="teacher-row">

        <?php
include "../model/db.php";

$sql = "SELECT * FROM teachers";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="teacher-card">
        <img src="../uploads/teachers/<?php echo $row['image']; ?>">

        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['subject']; ?></p>
    </div>
<?php
}
?>

    </div>
</section>

        <center>
    <h1>Our Courses</h1>
</center>

<section class="courses">

    <div class="course-row">

        <div class="course-card">
            <img src="../images/ds.webp" alt="Course 1">
            <h3>Data Science</h3>
            
        </div>

        <div class="course-card">
            <img src="../images/ml.webp" alt="Course 2">
            <h3>Machine Learning</h3>
            
        </div>

        <div class="course-card">
            <img src="../images/cv.jfif" alt="Course 3">
            <h3>Computer Vision</h3>
            
        </div>

    </div>
</section>


<footer>
    <h3 class="footer_text">All &copy; reserved by W-school</h3>
</footer>
</body>
</html>