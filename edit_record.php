<?php
include "./include/connect.php"; // Database connection

// Check if ID is passed in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer
    
    // If the form is submitted, update the record
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $code = $_POST['code'];
        $borrowed_date = $_POST['borrowed_date'];
        $returned_date = $_POST['returned_date'];
        $status = $_POST['status'];

        // Update query
        $update_query = "UPDATE borrow_records SET code = '$code', borrowed_date = '$borrowed_date', returned_date = '$returned_date', status = '$status' WHERE id = $id";
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Record updated successfully!')</script>";
            echo "<script>window.location.href='borrow.php'</script>";
        } else {
            echo "<script>alert('Failed to update record: ')</script>" ;
        }
    }

    // Fetch record details to populate the form
    $query = "SELECT * FROM borrow_records WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $record = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-4">
    <h2>Edit Record</h2>
    
    <?php if (isset($record)): ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="<?php echo $record['code']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="borrowed_date" class="form-label">Borrowed Date</label>
            <input type="date" class="form-control" id="borrowed_date" name="borrowed_date" value="<?php echo $record['borrowed_date']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="returned_date" class="form-label">Returned Date</label>
            <input type="date" class="form-control" id="returned_date" name="returned_date" value="<?php echo $record['returned_date']; ?>">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Borrowed" <?php if ($record['status'] == 'Borrowed') echo 'selected'; ?>>Borrowed</option>
                <option value="Returned" <?php if ($record['status'] == 'Returned') echo 'selected'; ?>>Returned</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
    <?php else: ?>
        <p>Record not found.</p>
    <?php endif; ?>
</div>

<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
