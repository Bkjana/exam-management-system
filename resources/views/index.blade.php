<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Management System</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .jumbotron {
            background-color: #007bff;
            color: #fff;
        }

        .login-box {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .advantages {
            margin-top: 30px;
        }

        .advantages img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Jumbotron Header -->
    <div class="jumbotron text-center">
        <h1 class="display-4">Exam Management System</h1>
        <p class="lead">Manage your exams with ease!</p>
    </div>

    <!-- Login Box -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-box">
                    <h2 class="text-center mb-4"><a href="/login">Login</a></h2>
                    <p class="text-center">Don't have an account? </p>
                    <div class="d-flex justify-content-between">
                        <a href="/student/register">Student Register here</a>
                        <a href="/teacher/register">Teacher Register here</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Advantages of Online Management System -->
    <div class="container advantages">
        <div class="row">
            <div class="col-md-6">
                <h2>Advantages of Exam Management System</h2>
                <ul>
                    <li>Convenient and easy-to-use platform for managing exams and assessments.</li>
                    <li>Streamlined process for creating, scheduling, and grading exams.</li>
                    <li>Secure and reliable data storage to ensure the integrity of exam records.</li>
                    <li>Instant feedback and results for both students and instructors.</li>
                    <li>Ability to generate detailed reports and analytics for performance evaluation.</li>
                    <li>Time-saving and paperless solution for exam administration.</li>
                </ul>
                <a href="/admin/login" class="btn btn-success">Admin Login</a>
            </div>
            <div class="col-md-6">
                <img src="{{asset('storage/online-exam.jpeg')}}" alt="Exam Management System" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
