<!DOCTYPE html>
<html>
<head>
    <title>Student Admission</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #4e73df, #1cc88a);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 420px;
            background: #fff;
            margin: 60px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        .submit-btn {
            background: #4e73df;
            color: white;
        }

        .submit-btn:hover {
            background: #2e59d9;
        }

        .back-btn {
            background: #6c757d;
            color: white;
        }

        .back-btn:hover {
            background: #5a6268;
        }

        #msg {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>

    <!-- JS Validation -->
    <script>
        function validateForm() {
            let f = document.forms["admissionForm"];

            if (
                f.name.value === "" ||
                f.email.value === "" ||
                f.phone.value === "" ||
                f.username.value === "" ||
                f.password.value === "" ||
                f.course.value === ""
            ) {
                alert("All fields are required!");
                return false;
            }

            if (!f.email.value.includes("@")) {
                alert("Invalid email format!");
                return false;
            }

            if (f.password.value.length < 6) {
                alert("Password must be at least 6 characters!");
                return false;
            }
            <!DOCTYPE html>
<html>
<head>
    <title>Student Admission</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #4e73df, #1cc88a);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 420px;
            background: #fff;
            margin: 60px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        .submit-btn {
            background: #4e73df;
            color: white;
        }

        .submit-btn:hover {
            background: #2e59d9;
        }

        .back-btn {
            background: #6c757d;
            color: white;
        }

        .back-btn:hover {
            background: #5a6268;
        }

        #msg {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>

    <!-- JS Validation -->
    <script>
        function validateForm() {
            let f = document.forms["admissionForm"];

            if (
                f.name.value === "" ||
                f.email.value === "" ||
                f.phone.value === "" ||
                f.username.value === "" ||
                f.password.value === "" ||
                f.course.value === ""
            ) {
                alert("All fields are required!");
                return false;
            }

            if (!f.email.value.includes("@")) {
                alert("Invalid email format!");
                return false;
            }

            if (f.password.value.length < 6) {
                alert("Password must be at least 6 characters!");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>

<div class="container">

    <h2>🎓 Student Admission</h2>

    <form id="admissionForm" onsubmit="return validateForm();">

        <input type="text" name="name" placeholder="Full Name">

        <input type="email" name="email" placeholder="Email">

        <input type="text" name="phone" placeholder="Phone">

        <input type="text" name="username" placeholder="Username">

        <input type="password" name="password" placeholder="Password">

        <select name="course">
            <option value="">Select Course</option>
            <option>Data Science</option>
            <option>Machine Learning</option>
            <option>Computer Vision</option>
        </select>

        <button type="submit" class="submit-btn">
            ✅ Submit Admission
        </button>

        <button type="button" class="back-btn"
            onclick="window.location.href='../../index.php'">
            ⬅ Back to Home
        </button>

    </form>

    <p id="msg"></p>

</div>

<script>
document.getElementById("admissionForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("../../Controller/StudentController.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("msg").innerHTML = data.message;

        if (data.status === "success") {
            setTimeout(() => {
                window.location.href = "student_login.php";
            }, 2000);
        }
    });
});
</script>

</body>
</html>


            return true;
        }
    </script>
</head>

<body>

<div class="container">

    <h2>🎓 Student Admission</h2>

    <form id="admissionForm" onsubmit="return validateForm();">

        <input type="text" name="name" placeholder="Full Name">

        <input type="email" name="email" placeholder="Email">

        <input type="text" name="phone" placeholder="Phone">

        <input type="text" name="username" placeholder="Username">

        <input type="password" name="password" placeholder="Password">

        <select name="course">
            <option value="">Select Course</option>
            <option>Data Science</option>
            <option>Machine Learning</option>
            <option>Computer Vision</option>
        </select>

        <button type="submit" class="submit-btn">
            ✅ Submit Admission
        </button>

        <button type="button" class="back-btn"
            onclick="window.location.href='../../index.php'">
            ⬅ Back to Home
        </button>

    </form>

    <p id="msg"></p>

</div>

<script>
document.getElementById("admissionForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("../../Controller/StudentController.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("msg").innerHTML = data.message;

        if (data.status === "success") {
            setTimeout(() => {
                window.location.href = "student_login.php";
            }, 2000);
        }
    });
});
</script>

</body>
</html>
