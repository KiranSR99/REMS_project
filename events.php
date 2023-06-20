<?php
include './config/database.php';
$table="events_tbl";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <?php include './includes/links.php'; ?>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <section class="intro">
        <div class="container">
            <div class="introduction">
                <h1>Events</h1>
                <p>High profile event on your mind? Be it a board meeting, strategy summit, conference, corporate party,
                    team outing or a personal occasion like birthday, anniversary or an intimate wedding, we have an
                    ideal
                    venue just for you. An undeniable desire of organizing any intimate occasion or event is fulfilled
                    with
                    our spellbinding venue. What you would witness here is our exquisite venue in a rural landscape all
                    yours to deck up. No matter what occasion it is, you are going to have the time of your life here.
                    See
                    for yourself!</p>
            </div>
        </div>
    </section>

    <?php
        $conn = new database();
        $data = $conn->select($table,"*",$where = "status = 1");
        $conn->print_card($data, 'event', 'description', 'photo');
    ?>

    <section class="events">
        <div class="container">
            <div class="introduction">
                <h1>Create Your Custom Event</h1>
                <p class="custom-event">Unleash your creativity with our custom event service. Customize every detail,
                    from
                    venue to menu, with
                    our expert event management team. Trust us to bring your vision to life, while you enjoy
                    unforgettable
                    moments.
                </p>
                <a class="btn" href="#">Create Now</a>
            </div>
        </div>
    </section>

    <?php include './includes/footer.php'; ?>

</body>

</html>