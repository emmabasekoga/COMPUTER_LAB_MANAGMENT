<?php
include "./include/connect.php"; // Database connection

// Fetch borrowing records from the database
// Fetch borrowing records from the database
$query = "SELECT id, created_at AS date_created, code, borrowed_date, returned_date, status FROM borrow_records";
$result = mysqli_query($conn, $query); // Run the query

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body>

<!-- Main container with Bootstrap grid -->
<div class="container-fluid">
    <div class="row">
        
        <!-- Sidebar -->
        <?php include "./include/sidebar.php"; ?>
        
        <!-- Main content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 16.67%; padding-top: 20px;">
            <div class="container my-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>List of Borrowing Records</h3>
                    <a href="manage_record.php" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                </div>

                <!-- Table -->
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Date Created</th>
                                <th>Code</th>
                                <th>Borrowed Date</th>
                                <th>Returned Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($record = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo $record['id']; ?></td>
                                        <td><?php echo $record['date_created']; ?></td>
                                        <td><?php echo $record['code']; ?></td>
                                        <td><?php echo $record['borrowed_date']; ?></td>
                                        <td><?php echo ($record['returned_date'] !== null) ? $record['returned_date'] : '---'; ?></td>
                                        <td>
                                            <?php if ($record['status'] == 'Returned'): ?>
                                                <span class="badge bg-primary">Returned</span>
                                            <?php else: ?>
                                                <span class="badge bg-info">Borrowed</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionMenu">
                                                    <li><a class="dropdown-item" href="view_record.php?id=<?php echo $record['id']; ?>"><i class="fas fa-eye"></i> View</a></li>
                                                    <li><a class="dropdown-item" href="edit_record.php?id=<?php echo $record['id']; ?>"><i class="fas fa-edit"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="delete_record.php?id=<?php echo $record['id']; ?>"><i class="fas fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No records found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (placeholder) -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
<script src="../js/all.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>
