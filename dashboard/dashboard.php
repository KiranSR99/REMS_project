<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../includes/links-dashboard.php'; ?>

</head>

<body>
    <?php
    include '../includes/dashboard-aside.php';
    ?>

    <div class="main-content">
        <div class="container">
            <div class="stat-cards">
                <div class="card">
                    <i class="fa-solid fa-users"></i>
                    <h4>1234</h4>
                    <P>Total Customers</P>
                </div>
                <div class="card">
                    <i class="fas fa-calendar-check"></i>
                    <h4>123</h4>
                    <P>Reservations</P>
                </div>
                <div class="card">
                    <i class="fas fa-dollar-sign"></i>
                    <h4>Rs. 12345678.90</h4>
                    <P>Total Revenues</P>
                </div>
                <div class="card">
                    <i class="fas fa-clock"></i>
                    <h4>Upcoming</h4>
                    <P>Resort Packages</P>
                </div>
            </div>
        </div>
    </div>
</body>

</html>