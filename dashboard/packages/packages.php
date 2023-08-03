<?php
include '../checkLogin.php';
include '../../config/database.php';
$table = "packages_tbl";
$conn = new database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../../includes/links-dashboard.php'; ?>

    <style>
    .add-feature {
        position: relative;
    }

    .add-feature .add-event {
        margin-bottom: 10px;
    }

    .add-feature .dropdown-package {
        position: absolute;
        top: calc(100% + 45px);
        left: 14%;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        display: none;
    }

    .add-feature .dropdown-package.show {
        display: block;
    }

    .add-feature .dropdown-package a {
        display: block;
        padding: 5px;
        text-decoration: none;
        color: var(--thirty);
    }

    .add-feature .dropdown-package a:hover {
        color: var(--ten);
    }

    .main-content {
        position: relative;
    }

    .main-content table {
        position: relative;
        z-index: 0;
    }
    </style>
</head>

<body>
    <?php include '../../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="add-event">
                <a href="add-package.php">Add Package</a>
            </div>
            <div class="add-feature">
                <button onclick="togglePackage()">Add Feature</button>
                <div class="dropdown-package" id="dropdownPackage">
                    <?php
                    $data = $conn->select($table, "*", "status = 1");
                    foreach ($data as $row) {
                        echo "<a href='add-features.php?id=".$row['id']."'>".$row['package']."</a>";
                    }
                    ?>
                </div>
            </div>
            <table>
                <tr>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Package</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                $data = $conn->select($table, "*");
                $columns = ['id', 'package', 'description', 'photo'];
                $conn->print_table($data, "", $columns, 'delete-package.php', 'edit-package.php');
                ?>
            </table>
        </div>
    </div>

    <script>
    function togglePackage() {
        var dropdownPackage = document.getElementById('dropdownPackage');
        dropdownPackage.classList.toggle('show');
    }

    window.addEventListener('click', function(event) {
        var dropdownPackage = document.getElementById('dropdownPackage');
        if (!event.target.closest('.add-feature')) {
            dropdownPackage.classList.remove('show');
        }
    });
    </script>
</body>

</html>