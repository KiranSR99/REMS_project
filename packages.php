<?php
include './config/database.php';
$table="packages_tbl";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <?php include './includes/links.php'; ?>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <div class="title">
        <h1>Explore Our Packages</h1>
    </div>

    <?php
        $conn = new database();
        $data = $conn->select($table,"*",$where = "status = 1");
        $conn->print_card($data, 'package', 'description', 'photo', 'packages', 'package_id');
    ?>

    <?php include './includes/footer.php'; ?>

</body>

</html>