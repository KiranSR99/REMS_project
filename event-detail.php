<?php
include './dashboard/checkLogin.php';
include './config/database.php';
$table = "events_tbl";
$table2 = "event_features";
$conn = new database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Detail</title>
    <?php include './includes/links.php'; ?>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <div class="package-card">
        <?php
        $eventID = $_GET['event_id'];
        $data = $conn->select($table, "*","id = $eventID");
        foreach ($data as $row) {
            echo "<div class='image-div'><img src='./dashboard/uploadedImages/" . $row['photo'] . "' alt='PackagePhoto'></div>";
            echo "<div class='text'>";
            echo "<h2>".$row['event']."</h2>";
            echo "<p>".$row['description']."</p>";
            echo "<a href='reservation.php?event_id={$row['id']}' class='btn' type='submit'>Book Now</a>";
            echo "</div>";
        }
        ?>
    </div>


    <div class="container">
        <div class="event-detail">
            <div class="box">
                <div class="event-price-info">
                    <h3>Price Estimate</h3>
                    <div class="row">
                        <p>Per Plate System (Average)</p>
                        <p>Starting price Rs.2000 each for 200 people</p>
                    </div>

                    <div class="field row">
                        <div class="column">
                            <p>DJ Service</p>
                            <p>Starting Price Rs. 10000</p>
                        </div>
                        <div class="column">
                            <p>Projectors</p>
                            <p>Starting Price Rs. 10000</p>
                        </div>
                    </div>

                    <div class="field row">
                        <div class="column">
                            <p>Decoration Service</p>
                            <p>Contact for Price</p>
                        </div>
                        <div class="column">
                            <p>Renting Space without food</p>
                            <p>Starting Price Rs. 40000</p>
                        </div>
                    </div>
                    <div class="field row">
                        <div class="column">
                            <p>Space Preference</p>
                            <p>Indoor</p>
                        </div>
                        <div class="column">
                            <p>Advance Payment</p>
                            <p>50000</p>
                        </div>
                    </div>
                    <div class="row">
                        <p>Venue Hall Capacity (people)</p>
                        <p>Hall 1: 200, Hall 2: 400</p>
                    </div>

                </div>
                <div class="other-info">
                    <div class="column">
                        <li class="checked">Alcohol Service</li>
                        <li class="checked">DJ Service</li>
                        <li class="checked">Private Parking for 30 Cars</li>
                        <li class="unchecked">Firecrackers Allowed</li>
                        <li class="unchecked">Outside Catering Allowed</li>
                        <li class="checked">Outside Decorator Allowed</li>
                    </div>
                    <div class="column">
                        <li class="checked">Allowed to bring own alcoholic beverage</li>
                        <li class="checked">Allowed to bring own DJ</li>
                        <li class="checked">Changing Room</li>
                        <li class="checked">Projectors</li>
                        <li class="checked">Decoration Service</li>
                        <li class="checked">Renting Space without food</li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './includes/footer.php'; ?>

</body>

</html>