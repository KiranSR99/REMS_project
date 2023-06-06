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
    <?php include '../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class=" container">
            <div class="add-event">
                <a href="add-event.php">Add Event</a>
            </div>
            <table>
                <tr>
                    <th>#</th>
                    <th>Event</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                </tr>
                <tr class="clickable-row" data-href="another-page.html">
                    <td>1</td>
                    <td>Wedding</td>
                    <td id="desc-column">Celebrate your love amidst enchanting beauty. Experience a dream wedding,
                        where every
                        detail
                        is tailored to perfection. Create cherished memories that will last forever.</td>
                    <td>
                        <div class="buttons">
                            <a href="edit-event.php">Edit</a>
                            <a href="delete-event.php">Delete</a>
                        </div>
                    </td>
                </tr>
                <tr class="clickable-row" data-href="another-page.html">
                    <td>1</td>
                    <td>Wedding</td>
                    <td id="desc-column">Celebrate your love amidst enchanting beauty. Experience a dream wedding,
                        where every
                        detail
                        is tailored to perfection. Create cherished memories that will last forever.</td>
                    <td>
                        <div class="buttons">
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    </td>
                </tr>
                <tr class="clickable-row" data-href="another-page.html">
                    <td>1</td>
                    <td>Wedding</td>
                    <td id="desc-column">Celebrate your love amidst enchanting beauty. Experience a dream wedding,
                        where every
                        detail
                        is tailored to perfection. Create cherished memories that will last forever.</td>
                    <td>
                        <div class="buttons">
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    </td>
                </tr>
                <tr class="clickable-row" data-href="another-page.html">
                    <td>1</td>
                    <td>Wedding</td>
                    <td id="desc-column">Celebrate your love amidst enchanting beauty. Experience a dream wedding,
                        where every
                        detail
                        is tailored to perfection. Create cherished memories that will last forever.</td>
                    <td>
                        <div class="buttons">
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>