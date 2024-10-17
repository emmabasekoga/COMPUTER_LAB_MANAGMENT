<?php
include "./include/connect.php"; // Database connection

// Check if ID is passed in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer
    
    // Fetch record details
    $query = "SELECT * FROM borrow_records WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='alert alert-danger'>Record not found. Please check the record ID.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>No record ID provided.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-4">
    <?php if (isset($record)): ?>
        <div class="card">
            <div class="card-header">
                <h3>Record Details for Code: <?php echo $record['code']; ?></h3>
            </div>
            <div class="card-body">
                <p><strong>Date Created:</strong> <?php echo $record['created_at']; ?></p>
                <p><strong>Borrowed Date:</strong> <?php echo $record['borrowed_date']; ?></p>
                <p><strong>Returned Date:</strong> <?php echo $record['returned_date'] ? $record['returned_date'] : '---'; ?></p>
                <p><strong>Status:</strong> <?php echo $record['status']; ?></p>
            </div>
            <div class="card-footer">
                <a href="borrow.php" class="btn btn-primary">Back to Records List</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            <p>No record found. Please provide a valid record ID.</p>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
