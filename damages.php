<?php
// Include the database connection file
include "./include/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Damage Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS for Icons -->
    <link rel="stylesheet" href="./css/all.css">
</head>
<body>

<!-- Main container with Bootstrap grid -->
<div class="container-fluid">
    <div class="row">
        
        <!-- Sidebar -->
        <?php include "./include/sidebar.php"; ?> <!-- Including the sidebar -->

        <!-- Main content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 16.67%; padding-top: 20px;">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>List of Damages</h3>
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDamageModal">
                        <i class="fas fa-plus"></i> Create New
                    </button>
                </div>

                <!-- Damage Table (example) -->
                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2024-03-27 15:47</td>
                            <td><span class="badge bg-danger">Unfixed</span></td>
                            <td>
                                <button class="btn btn-secondary">Action</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal Structure -->
            <div class="modal fade" id="addDamageModal" tabindex="-1" aria-labelledby="addDamageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDamageModalLabel"><i class="fas fa-plus"></i> Add New Damage</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body with Form -->
                        <div class="modal-body">
                            <form action="add_damage.php" method="POST">
                                <!-- Item Dropdown -->
                                <div class="mb-3">
                                    <label for="item" class="form-label">Item</label>
                                    <select class="form-select" id="item" name="item" required>
                                        <option selected disabled value="">Please select item here</option>
                                        <option value="Item 1">Item 1</option>
                                        <option value="Item 2">Item 2</option>
                                        <!-- Add more options here -->
                                    </select>
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                                <!-- Status Dropdown -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="Unfixed">Unfixed</option>
                                        <option value="Fixed">Fixed</option>
                                    </select>
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/all.js"></script>
</body>
</html>
