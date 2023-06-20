<?php
include '../checkLogin.php';
include '../../config/database.php';
$table="packages_tbl";
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


</head>

<body>
    <?php include '../../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="add-event">
                <a href="add-package.php">Add Package</a>
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
                $data = $conn->select($table,"*");
                $columns = ['id','package', 'description','photo'];
                $conn->print_table($data, "",$columns, 'delete-package.php', 'edit-package.php');

                ?>
            </table>
        </div>
    </div>

</body>

</html>