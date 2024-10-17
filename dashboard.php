<?php
session_start();

// Simulating user login for demonstration purposes
$_SESSION['user_name'] = "Emmanuel Baskwaga"; // Replace with actual user session data

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
   <?php include "./include/sidebar.php"; ?>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Top bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <a class="navbar-brand" href="#">CKT.UTAS COMPUTER LABORATORY MANAGEMENT SYSTEM - Admin</a>
                <div class="ms-auto d-flex align-items-center">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-dark" href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Welcome and statistics cards -->
            <div class="py-4">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-list fa-2x"></i>
                                <h5 class="card-title">Categories</h5>
                                <p class="card-text">1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-box-open fa-2x"></i>
                                <h5 class="card-title">Pending Borrowed</h5>
                                <p class="card-text">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cover image -->
            <div class="row">
                <div class="col-12">
                    <img src="./img/cover.jpg" class="img-fluid h-50 w-100" alt="Lab Cover">
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
