<?php
// Include your database connection file
include './include/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $borrowerType = $_POST['borrowerType'];
    $borrowerName = $_POST['borrowerName'];
    $department = $_POST['department'];
    $borrowedDate = $_POST['borrowedDate'];
    $itemList = $_POST['itemList'];
    $remarks = $_POST['remarks'];

    // SQL query to insert the data into the database
    $sql = "INSERT INTO borrow_records (borrower_type, borrower_name, department, borrowed_date, items, remarks) 
            VALUES ('$borrowerType', '$borrowerName', '$department', '$borrowedDate', '$itemList', '$remarks')";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Borrow record saved successfully!');</script>";
        echo "<script>window.location.href='borrow.php'</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Borrow Record</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
        }

        .content-wrapper {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding: 20px;
        }

        /* Additional styling */
        .form-control {

            margin-bottom: 20px;
        }

        .btn-primary {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<?php 
include"./include/sidebar.php"
?>
<!-- Main Content -->
<div class="content-wrapper">
    <h2>Add New Borrow Record</h2>

    <form action="" method="POST">
        <!-- Borrower Type -->
        <div class="form-group">
            <label for="borrowerType">Borrower</label><br>
            <input type="radio" id="faculty" name="borrowerType" value="Faculty" required> Faculty<br>
            <input type="radio" id="student" name="borrowerType" value="Student" required> Student<br>
            <input type="radio" id="staff" name="borrowerType" value="Staff" required> Staff
        </div>

        <!-- Borrower Name and Department -->
        <div class="row">
            <div class="col-md-6">
                <label for="borrowerName">Borrower Name</label>
                <input type="text" id="borrowerName" name="borrowerName" class="form-control" placeholder="Enter Borrower Name" required>
            </div>
            <div class="col-md-6">
                <label for="department">Department</label>
                <input type="text" id="department" name="department" class="form-control" placeholder="Enter Department" required>
            </div>
        </div>

        <!-- Borrowed Date -->
        <div class="form-group">
            <label for="borrowedDate">Borrowed Date</label>
            <input type="date" id="borrowedDate" name="borrowedDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <!-- Item Dropdown -->
        <div class="form-group">
            <label for="item">Item</label>
            <select id="item" name="item" class="form-control">
                <option value="" disabled selected>Please select category here</option>
                <option value="Projector">Projector</option>
                <option value="Laptop">Laptop</option>
                <option value="Tablet">Tablet</option>
                <option value="Other">Other</option>
            </select>
            <button type="button" class="btn btn-primary mt-2" onclick="addItem()">+ Add to List</button>
        </div>

        <!-- Items List -->
        <div class="form-group">
            <h4>Items</h4>
            <textarea id="itemList" name="itemList" class="form-control" rows="3" placeholder="List of items added will appear here..." readonly></textarea>
        </div>

        <!-- Remarks -->
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Additional remarks (optional)"></textarea>
        </div>

        <!-- Save and Cancel Buttons -->
        <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-success me-2">Save</button>
            <a href="borrow.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
<script src="../js/all.js"></script>
<script src="../js/all.min.js"></script>

<script>
    function addItem() {
        const itemDropdown = document.getElementById('item');
        const selectedItem = itemDropdown.options[itemDropdown.selectedIndex].text;
        const itemList = document.getElementById('itemList');

        if (selectedItem && selectedItem !== 'Please select category here') {
            itemList.value += selectedItem + '\\n'; // Add selected item to the textarea
        }
    }
</script>

</body>
</html>
