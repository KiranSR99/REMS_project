<?php
include '../config/database.php';
$table = "events_tbl";

$conn = new database();

// Retrieve event data if an event ID is provided
if (isset($_GET['id'])) {
    $data = $conn->select($table, "*", "id=" . $_GET['id']);

    $id = $data[0]['id'];
    $event = $data[0]['event'];
    $description = $data[0]['description'];
    $photo = $data[0]['photo'];
}

if (isset($_POST['submit'])) {
    $event = $_POST['event'];
    $description = $_POST['description'];
    $eventId = $_POST['id'];

    // Check if a new image file has been uploaded
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Handle image upload
        $photo = $_FILES['photo']['name'];
        $photoPath = 'uploadedImages/' . $photo;
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
    }

    $data = [
        'event' => $event,
        'description' => $description,
        'status' => 1,
        'photo' => $photo,
    ];

    $where = "id=" . $eventId;
    $res = $conn->update($table, $data, $where);
    if ($res == true) {
        header('location:events.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <?php include '../includes/links-dashboard.php'; ?>
</head>

<body>
    <?php include '../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="event-form">
                <h1>Update Event</h1>
                <form method="POST" enctype="multipart/form-data" action="edit-event.php">
                    <div class="form-group">
                        <label for="event_title">Event:</label>
                        <input type="text" id="event_title" name="event"
                            value="<?php echo isset($event) ? $event : ''; ?>" required>
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
                    <input type="submit" class="btn" name="submit" value="Update Event">
                </form>
            </div>
        </div>
    </div>
</body>

</html>