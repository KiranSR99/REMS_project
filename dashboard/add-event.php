<?php
include '../config/database.php';
$table = "events_tbl";

$conn = new database();
if(isset($_POST['submit'])){
    $event = $_POST['event'];
    $description = $_POST['description'];

    // Handle image upload
    $photo = $_FILES['photo']['name'];
    $photoPath = 'uploadedImages/' . $photo;
    move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);

    $data = [
        'event' => $event,
        'description' => $description,
        'status' => 1,
        'photo' => $photo,
        'is_visible' => 1
    ];

    $res = $conn->insert($table, $data);
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
    <title>Add Event</title>
    <?php include '../includes/links-dashboard.php'; ?>
</head>

<body>
    <?php include '../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="event-form">
                <h1>Add Event</h1>
                <form method="POST" enctype="multipart/form-data" action="add-event.php">
                    <div class="form-group">
                        <label for="event_title">Event:</label>
                        <input type="text" id="event_title" name="event" required>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Description:</label>
                        <textarea id="event_description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Photo:</label>
                        <input type="file" name="photo">
                    </div>
                    <input type="submit" class="btn" name="submit" value="Add Event">

                </form>
            </div>
        </div>
    </div>

</body>

</html>