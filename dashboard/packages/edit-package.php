<?php
include '../../config/database.php';
$table = "packages_tbl";

$conn = new database();

// Retrieve event data if an event ID is provided
if (isset($_GET['id'])) {
    $data = $conn->select($table, "*", "id=" . $_GET['id']);

    $id = $data[0]['id'];
    $package = $data[0]['package'];
    $description = $data[0]['description'];
    $photo = $data[0]['photo'];
}

if (isset($_POST['submit'])) {
    $package = $_POST['package'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    // Check if a new image file has been uploaded
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Handle image upload
        $photo = $_FILES['photo']['name'];
        $photoPath = '../uploadedImages/' . $photo;
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
    }

    $data = [
        'package' => $package,
        'description' => $description,
        'status' => 1,
        'photo' => $photo,
    ];

    $where = "id=" . $id;
    $res = $conn->update($table, $data, $where);
    if ($res == true) {
        header('location:packages.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>
    <?php include '../../includes/links-dashboard.php'; ?>
</head>

<body>
    <?php include '../../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="event-form">
                <h1>Update Package</h1>
                <form method="POST" enctype="multipart/form-data" action="edit-package.php">
                    <div class="form-group">
                        <label for="event_title">Package:</label>
                        <input type="text" id="event_title" name="package"
                            value="<?php echo isset($package) ? $package : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Description:</label>
                        <textarea id="event_description" name="description"
                            required><?php echo isset($description) ? $description : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Photo:</label>
                        <input type="file" name="photo">
                    </div>
                    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
                    <input type="submit" class="btn" name="submit" value="Update Package">
                </form>
            </div>
        </div>
    </div>
</body>

</html>