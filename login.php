<?php 
session_start();

// Set up error logging
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/your/error.log');

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'management_system');

// Check connection
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Connection failed. Please try again later.");
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Log login attempt (without sensitive information)
    error_log("Login attempt for email: " . $email);

    // Query to select user with matching email and password
    $query = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        error_log("Query failed: " . mysqli_error($conn));
        die("An error occurred. Please try again later.");
    }

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $user['email'];
        error_log("Successful login for email: " . $email);
        echo "<script>alert('Login Successful');</script>";
        echo "<script>window.location. href = 'dashboard.php'</script>";
        // Redirect here 
    } else {
        error_log("Failed login attempt for email: " . $email);
        echo "<script>alert('Invalid email or password');</script>";
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Form</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="">
    <div class="">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Log In</h1>
        <form action="" method="POST" class="space-y-5 shadow-lg p-5">
            <div class="form-group">
                <label for="email" class="text-gray-600">Email</label>
                <input type="email" name="email" placeholder="Your Email" required class="form-control">
            </div>

            <div class="form-group">
                <label for="password" class="text-gray-600">Password</label>
                <input type="password" name="password" placeholder="Password" required class="form-control">
            </div>

            <a href="#" class="text-blue-600 hover:underline">Forgot your password?</a>

            <div class="flex justify-center form-group">
                <button name="login" type="submit" class="form-control btn btn-primary mt-2">Log In</button>
            </div>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">Don't have an account? 
            <a href="index.php" class="text-blue-600 hover:underline">Sign Up</a>
        </p>
            </div>
            <div class="col-md-4"></div>
        </div>
    
    </div>

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
