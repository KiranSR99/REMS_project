<?php
include '../../config/database.php';
$table = "packages_tbl";

$conn = new database();
if(isset($_POST['submit'])){
    $package = $_POST['package'];
    $description = $_POST['description'];

    // Handle image upload
    $photo = $_FILES['photo']['name'];
    $photoPath = '../uploadedImages/' . $photo;
    move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);

    $data = [
        'package' => $package,
        'description' => $description,
        'status' => 1,
        'photo' => $photo
    ];

    $res = $conn->insert($table, $data);
    if ($res == true) {
        header('Location:packages.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <?php include '../../includes/links-dashboard.php'; ?>
</head>

<body>
    <?php include '../../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="event-form">
                <h1>Add Package</h1>
                <form method="POST" enctype="multipart/form-data" action="add-package.php">
                    <div class="form-group">
                        <label for="event_title">Package:</label>
                        <input type="text" id="event_title" name="package" required>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Description:</label>
                        <textarea id="event_description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Photo:</label>
                        <input type="file" name="photo">
                    </div>
                    <input type="submit" class="btn" name="submit" value="Add Package">

                </form>
            </div>
        </div>
    </div>

</body>

</html>