<?php
include "Model/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>W-School</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav>
    <div class="logo">W-School</div>
    <ul>
       <li><a href="View/teacher/teacher_login.php">Teacher</a></li>
        <li><a href="View/admin/admin_home.php">Admin</a></li>
        <li><a href="View/student/admission.php">Admission</a>
</li>
        <li><a href="View/login.php">Login</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <h1>Welcome to W-School</h1>
    <p>We teach students with care & professionalism</p>
</section>

<!-- COURSES -->
<section class="courses">
    <h2>Our Courses</h2>

    <div class="course-box">

        <div class="course-card">
            <img src="assets/images/cv.jfif">
            <h3>Computer Vision</h3>
            <p>Learn image processing and AI vision systems.</p>
            <a href="View/course_details.php?course=cv">View Details</a>
        </div>

        <div class="course-card">
            <img src="assets/images/ml.webp">
            <h3>Machine Learning</h3>
            <p>Build intelligent models with real datasets.</p>
            <a href="View/course_details.php?course=ml">View Details</a>
        </div>

        <div class="course-card">
            <img src="assets/images/ds.webp">
            <h3>Data Science</h3>
            <p>Analyze data & make smart decisions.</p>
            <a href="View/course_details.php?course=ds">View Details</a>
        </div>

    </div>
</section>

<!-- TEACHERS -->
<section class="teachers">
    <h2>Our Teachers</h2>

    <div class="teacher-box">

        <?php
        $sql = "SELECT * FROM teachers";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="teacher-card">
                <img src="uploads/teachers/<?php echo $row['image']; ?>">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['subject']; ?></p>
            </div>
        <?php } ?>

    </div>
</section>

<footer>
    <p>© 2026 W-School | All Rights Reserved</p>
</footer>

</body>
</html>
