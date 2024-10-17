<?php
// Include database connection
include "./include/connect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo'];
        $photoName = $photo['name'];
        $photoTmpName = $photo['tmp_name'];
        $photoSize = $photo['size'];
        $photoError = $photo['error'];
        $photoType = $photo['type'];

        // Get the file extension
        $photoExtArray = explode('.', $photoName);
        $photoExt = strtolower(end($photoExtArray));  // Corrected this line
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        // Check if the uploaded file is allowed
        if (in_array($photoExt, $allowed)) {
            // Create a unique name for the file before saving
            $photoNewName = uniqid('', true) . "." . $photoExt;
            $photoDestination = './uploads/' . $photoNewName;

            // Check if uploads directory exists, if not create it
            if (!file_exists('./uploads')) {
                mkdir('./uploads', 0755, true);  // Create the directory with permissions
            }

            // Move the uploaded file to the uploads directory
            if (move_uploaded_file($photoTmpName, $photoDestination)) {
                // Successfully uploaded the file
            } else {
                echo "Failed to move uploaded file.";
                exit;
            }
        } else {
            echo "You cannot upload files of this type!";
            exit;
        }
    } else {
        $photoNewName = NULL; // No photo uploaded
    }

    // Insert data into the categories table
    $query = "INSERT INTO categories (name, description, status, photo) VALUES ('$name', '$description', '$status', '$photoNewName')";

    if (mysqli_query($conn, $query)) {
        // Redirect back to the category page after successful insertion
        echo "<script>alert('Record saved successfully');</script>";
    } else {
        echo "<script>alert('Record not saved successfully');</script>";
    }
}

// Fetch categories to display in the table
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="path_to_your_css.css">
</head>
<body>
    <!-- Sidebar -->
    <?php include './include/sidebar.php'; ?>

    <div class="container">
        <h1>List of Categories</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="./uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" width="50"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <?php if ($row['status'] == 'Active'): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No categories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Create New Button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            + Create New
        </button>

        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="category.php" method="POST" enctype="multipart/form-data">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <!-- Photo Upload -->
                            <div class="mb-3">
                                <label for="photo" class="form-label">Upload Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
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

    <!-- Add your JavaScript links here -->
    <script src="path_to_your_js.js"></script>
</body>
</html>
