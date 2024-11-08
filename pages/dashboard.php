<?php
session_start();

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

$students = $_SESSION['students'];

// Count the number of students per course
$countBSIS = 0;
$countBeed = 0;
$countBSTM = 0;
$countBSAIS = 0;
$countPolSci = 0;

foreach ($students as $student) {
    switch ($student['course']) {
        case 'BSIS':
            $countBSIS++;
            break;
        case 'Beed':
            $countBeed++;
            break;
        case 'BSTM':
            $countBSTM++;
            break;
        case 'BSAIS':
            $countBSAIS++;
            break;
        case 'PolSci':
            $countPolSci++;
            break;
    }
}

// Handle form submissions for Insert, Update, and Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'insert') {
            // Insert a new student
            $newStudent = [
                'student_id' => $_POST['student_id'],
                'name' => $_POST['name'],
                'course' => $_POST['course'],
                'year' => $_POST['year'],
                'section' => $_POST['section'],
                'age' => $_POST['age'],
                'gender' => $_POST['gender']
            ];
            $_SESSION['students'][] = $newStudent;
        } elseif ($_POST['action'] === 'update') {
            // Update an existing student
            $index = $_POST['index'];
            $_SESSION['students'][$index] = [
                'student_id' => $_POST['student_id'],
                'name' => $_POST['name'],
                'course' => $_POST['course'],
                'year' => $_POST['year'],
                'section' => $_POST['section'],
                'age' => $_POST['age'],
                'gender' => $_POST['gender']
            ];
        } elseif ($_POST['action'] === 'delete') {
            // Delete a student
            $index = $_POST['index'];
            array_splice($_SESSION['students'], $index, 1);
        }
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <!-- BSIS -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card bg-success text-white mb-4"> 
                                <div class="card-body">BSIS Students: <?php echo $countBSIS; ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- Beed -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card bg-primary text-white mb-4"> 
                                <div class="card-body">Beed Students: <?php echo $countBeed; ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- BSTM -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card bg-dark text-white mb-4"> 
                                <div class="card-body">BSTM Students: <?php echo $countBSTM; ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- BSAIS -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card bg-danger text-white mb-4"> 
                                <div class="card-body">BSAIS Students: <?php echo $countBSAIS; ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- PolSci -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card bg-warning text-white mb-4"> 
                                <div class="card-body">PolSci Students: <?php echo $countPolSci; ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
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
