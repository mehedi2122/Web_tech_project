<?php
$course = $_GET['course'] ?? '';

$course_data = [

    "cv" => [
        "title" => "Computer Vision",
        "desc" => "Computer Vision focuses on enabling machines to see, understand, and analyze images and videos.",
        "topics" => [
            "Image Processing",
            "Object Detection",
            "Face Recognition",
            "OpenCV",
            "Deep Learning"
        ]
    ],

    "ml" => [
        "title" => "Machine Learning",
        "desc" => "Machine Learning allows systems to learn from data and improve automatically.",
        "topics" => [
            "Supervised Learning",
            "Unsupervised Learning",
            "Regression",
            "Classification",
            "Model Training"
        ]
    ],

    "ds" => [
        "title" => "Data Science",
        "desc" => "Data Science focuses on analyzing and interpreting complex data.",
        "topics" => [
            "Data Analysis",
            "Python",
            "Statistics",
            "Visualization",
            "Big Data"
        ]
    ]
];

if (!array_key_exists($course, $course_data)) {
    echo "<h2 style='text-align:center;'>Course Not Found</h2>";
    exit;
}

$data = $course_data[$course];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title']; ?></title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<nav>
    <div class="logo">W-School</div>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../View/admission.php">Admission</a></li>
        <li><a href="../View/login.php">Login</a></li>
    </ul>
</nav>

<section class="course-detail">
    <h1><?php echo $data['title']; ?></h1>
    <p><?php echo $data['desc']; ?></p>

    <h3>Topics Covered</h3>
    <ul>
        <?php foreach ($data['topics'] as $topic) { ?>
            <li><?php echo $topic; ?></li>
        <?php } ?>
    </ul>

    <a href="../View/admission.php" class="btn">Apply Now</a>
</section>

</body>
</html>
