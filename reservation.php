<?php
include './dashboard/checkLogin.php';
include './config/database.php';
$table = "events_tbl";
$table2 = "reservation_tbl";
$conn = new database();

$eventID = $_GET['event_id'];
$data = $conn->select($table, "*","id = $eventID");

foreach($data as $row){
    $eventName = $row['event'];
}


if(isset($_POST['submit'])){
    $name =$_POST['name']; 
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $date =$_POST['date']; 
    $additional_notes =$_POST['additional_notes'];
    
    $data = [
        'fullname' => $name,
        'phone' => $phone,
        'email' => $email,
        'selected_date' => $date,
        'reserve_name' => $eventName,
        'additional_notes' => $additional_notes 
    ];

    $res = $conn->insert($table2, $data);
    if ($res == true) {
        header('location:payment.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Reservation</title>
    <?php include './includes/links.php'; ?>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <div class="container">
        <div id="reservation-form" class="reservation-form">
            <!-- <a href=""><img src="./assets/images/close.png" alt="close"></a> -->
            <?php
                echo "<h2>Reservation For ".$eventName."</h2>";
            ?>

            <form class="reserve-form" action="" method="POST">
                <div class="row">
                    <label for="name">Fullname</label>
                    <input type="text" name="name">
                </div>
                <div class="row">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone">
                </div>
                <div class="row">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="row">
                    <label for="date">Selected Date(s)</label>
                    <input type="text" name="date">
                </div>
                <div class="row">
                    <label for="">Additional Notes</label>
                    <textarea name="additional_notes" id="" cols="30" rows="10"></textarea>
                </div>

                <input type="submit" class="btn" value="Submit" name="submit">
            </form>
        </div>
    </div>



    <?php include './includes/footer.php'; ?>
</body>

</html>