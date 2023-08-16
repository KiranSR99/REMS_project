<?php
include '../../config/database.php';
$table = "reservation_tbl";

$conn = new database();

// Retrieve event data if an event ID is provided
if (isset($_GET['reserve_id'])) {
    $data = $conn->select($table, "*", "reserve_id=" . $_GET['reserve_id']);

    $reserve_id = $data[0]['reserve_id'];
    $reserve_name = $data[0]['reserve_name'];
    $selected_date = $data[0]['selected_date'];
    $fullname = $data[0]['fullname'];
    $phone = $data[0]['phone'];
    $email = $data[0]['email'];
    $additional_notes = $data[0]['additional_notes'];
}

if (isset($_POST['submit'])) {
    $reserve_id = $_POST[''];
    $fullname = $_POST[''];
    $phone = $_POST[''];
    $email = $_POST[''];
    $selected_date = $_POST[''];
    $additional_notes = $_POST[''];


    $data = [
        'fullname' => $fullname,
        'phone' => $phone,
        'email' => $email,
        'reserve_name' => $reserve_name,
        'selected_date' => $selected_date,
        'additional_notes' => $additional_notes
        
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
    <style>
    #reservation-form h2 {
        text-align: center;
    }
    </style>
    <?php include '../../includes/links-dashboard.php'; ?>
</head>

<body>
    <?php include '../../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div id="reservation-form" class="event-form">
                <?php
                echo "<h2>Reservation For ".$reserve_name."</h2>";
                ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Fullname</label>
                        <input type="text" name="name" value="<?php echo isset($fullname) ? $fullname : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Selected Date(s)</label>
                        <input type="text" name="date"
                            value="<?php echo isset($selected_date) ? $selected_date : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Additional Notes</label>
                        <textarea name="additional_notes" id="" cols="30"
                            rows="10"><?php echo isset($additional_notes) ? $additional_notes : ''; ?></textarea>
                    </div>

                    <input type="submit" class="btn" value="Submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>