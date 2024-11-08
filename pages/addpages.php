<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = [];
    }

    $_SESSION['students'][] = [
        'student_id' => $_POST['student_id'],
        'name' => $_POST['name'],
        'course' => $_POST['course'],
        'year' => $_POST['year'],
        'section' => $_POST['section'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender']
    ];

    header('Location: showdetails.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <?php include('../layout/style.php'); ?>
</head>
<body class="sb-nav-fixed">
    <?php include('../layout/header.php'); ?>
    <div id="layoutSidenav">
        <?php include('../layout/navigation.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Add Student</h1><br>
                    <div class="card mb-4" style="width: 500px">
                        <div class="card-header">Add User Information</div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="student_id" class="form-label">Student ID</label>
                                    <input type="text" class="form-control" id="student_id" name="student_id" value="22S" pattern="22S\w{4}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="course" class="form-label">Course</label>
                                    <select class="form-control" id="course" name="course" required>
                                        <option value="default" disabled selected>--Select Course--</option>
                                        <option value="BSIS">BS Information System</option>
                                        <option value="Beed">Bachelor of Elementary Education</option>
                                        <option value="BSTM">BS Tourism Management</option>
                                        <option value="BSAIS">BS Accountng Info. System</option>
                                        <option value="PolSci"> BS Political Science</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <select class="form-control" id="year" name="year" required>
                                        <option value="default" disabled selected>--Select Year--</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <input type="text" class="form-control" id="section" name="section" required>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label><br>
                                    <input type="radio" id="male" name="gender" value="Male" required>
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="Female" required>
                                    <label for="female">Female</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('../layout/footer.php'); ?>
        </div>
    </div>
    <?php include('../layout/script.php'); ?>
</body>
</html>
