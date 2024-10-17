<head>
    <!-- Font Awesome CSS (offline version) -->
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/all.min.css">
    
    <!-- Bootstrap CSS (offline version) -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <style>
        li{
            font-size: 15px;
        }
    </style>
</head>

<body>
    <!-- Sidebar Navigation -->
    <nav class="col-md-2  bg-dark sidebar vh-100 position-fixed">
        <div class="sidebar-heading text-light py-3 px-3">CK-TEDAM</div>
        <ul class="nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-light" href="dashboard.php">
                    <i class="fas fa-tachometer-alt"></i> <!-- Font Awesome Icon -->
                    Dashboard
                </a>
            </li>

            <!-- Records Section -->
            <li class="nav-item">
                <a class="nav-link text-light" href="borrow.php">
                    <i class="fas fa-book"></i> <!-- Font Awesome Icon -->
                    Borrows
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="damages.php">
                    <i class="fas fa-tools"></i> <!-- Font Awesome Icon -->
                    Damages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="inventory.php">
                    <i class="fas fa-box"></i> <!-- Font Awesome Icon -->
                    Inventory
                </a>
            </li>

            <!-- Master List Section -->
            <li class="nav-item mt-3">
                <span class="text-light">Master List</span>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="category.php">
                    <i class="fas fa-list"></i> <!-- Font Awesome Icon -->
                    Category List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">
                    <i class="fas fa-table"></i> <!-- Font Awesome Icon -->
                    Item List
                </a>
            </li>

            <!-- Maintenance Section -->
            <li class="nav-item mt-3">
                <span class="text-light">Maintenance</span>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">
                    <i class="fas fa-users"></i> <!-- Font Awesome Icon -->
                    User List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light text-sm" href="system_info.php">
                    <i class="fas fa-cogs"></i> <!-- Font Awesome Icon -->
                    System Information
                </a>
            </li>
        </ul>
    </nav>

    <!-- Font Awesome JS (Optional if needed for dynamic icons) -->
    <script src="./js/all.js"></script>
    <script src="./js/all.min.js"></script>

    <!-- Bootstrap JS (offline version) -->
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
