<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle system information data
    $systemName = $_POST['systemName'];
    $systemShortName = $_POST['systemShortName'];

    // Handle file upload for CK-LOGO
    if (isset($_FILES['systemLogo']) && $_FILES['systemLogo']['error'] === UPLOAD_ERR_OK) {
        $logoTmpPath = $_FILES['systemLogo']['tmp_name'];
        $logoName = $_FILES['systemLogo']['name'];
        $logoUploadPath = 'uploads/' . basename($logoName);
        move_uploaded_file($logoTmpPath, $logoUploadPath);
    }

    // Handle file upload for Website Cover
    if (isset($_FILES['websiteCover']) && $_FILES['websiteCover']['error'] === UPLOAD_ERR_OK) {
        $coverTmpPath = $_FILES['websiteCover']['tmp_name'];
        $coverName = $_FILES['websiteCover']['name'];
        $coverUploadPath = 'uploads/' . basename($coverName);
        move_uploaded_file($coverTmpPath, $coverUploadPath);
    }

    echo "System information saved successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Information</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body>

<div class="container-fluid d-flex">
    <!-- Sidebar -->
    <div class="col-md-2 p-0">
        <?php include "./include/sidebar.php"; ?>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">
        <div class="content-wrapper bg-light rounded p-4 shadow">
            <h3>System Information</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- System Name -->
                <div class="form-group mb-3">
                    <label for="systemName">System Name</label>
                    <input type="text" id="systemName" name="systemName" class="form-control" placeholder="Enter System Name" required>
                </div>

                <!-- System Short Name -->
                <div class="form-group mb-3">
                    <label for="systemShortName">System Short Name</label>
                    <input type="text" id="systemShortName" name="systemShortName" class="form-control" placeholder="Enter System Short Name" required>
                </div>

                <!-- System CK-LOGO -->
                <div class="form-group mb-3">
                    <label for="systemLogo">System CK-LOGO</label>
                    <input type="file" id="systemLogo" name="systemLogo" class="form-control" accept="image/*" required>
                </div>

                <!-- Logo Preview -->
                <div class="text-center mb-3">
                    <img id="logoPreview" src="default-logo.png" alt="CK-Logo Preview" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                </div>

                <!-- Website Cover -->
                <div class="form-group mb-3">
                    <label for="websiteCover">Website Cover</label>
                    <input type="file" id="websiteCover" name="websiteCover" class="form-control" accept="image/*" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/all.min.js"></script>
<script>
    // JavaScript to preview the uploaded CK-LOGO image
    document.getElementById('systemLogo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logoPreview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>
