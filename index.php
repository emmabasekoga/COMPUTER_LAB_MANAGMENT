<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'management_system');

session_start();

if (isset($_POST['submit'])) {
    // Get form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

    // Check if passwords match
    if ($password == $confirmpassword) {

        // Check if the email already exists in the database
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            // If email exists, alert the user
            echo "<script>alert('Email already exists. Please try another email.');</script>";
        } else {
            // If email does not exist, insert the new record
            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            $exe = mysqli_query($conn, $query);

            if ($exe) {
                echo "<script>alert('Record Saved Successfully');</script>";
                echo "<script>window.location.href='#signIn';</script>";
            } else {
                echo "<script>alert('Record Not Saved Successfully: " . mysqli_error($conn) . "');</script>";
            }
        }
    } else {
        echo "<script>alert('Password mismatch');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="">
    <div class="bg-white  w-full max-w-md p-10">
    <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Create an Account</h1>
        <form action="" method="POST" class="p-5 shadow-lg">
            <div class="form-group">
                <label for="name" class="text-gray-600">Name</label>
                <input type="text" name="name" placeholder="Your Name" class="form-control">
            </div>
           

            <div class="form-group">
                <label for="email" class="text-gray-600">Email</label>
                <input type="email" name="email" placeholder="Your Email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password" class="text-gray-600">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>

            <div class="form-group">
                <label for="confirmpassword" class="text-gray-600">Confirm Password</label>
                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
            </div>

            <div class="flex justify-center">
                <button name="submit" class="form-control mt-2 btn btn-primary">Sign Up</button>
            </div>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">Already have an account? 
            <a href="login.php" class="text-blue-600 hover:underline">Sign In</a>
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