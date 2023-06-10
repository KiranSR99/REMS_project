<?php
include '../config/database.php';
$table = "events_tbl";
$conn = new database();
?>
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
        <div class="container">
            <table>
                <?php
                if (isset($_POST["submit"])) {
                    if ($conn->delete($table, "id=" . $_POST["id"])) {
                        header('location:events.php');
                    } else {
                        echo "Issue in deleting data";
                    }
                }
                if (isset($_GET['id'])) {
                    $data = $conn->select($table, "*", "id=" . $_GET['id']);
                    $conn->print_table($data, "delete");
                }
                ?>
            </table>
            <?php if (isset($_GET['id'])) : ?>
            <form class="delete-form" method="post" action="delete-event.php">
                <p>Are you sure you want to delete this data?</p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="delete-buttons">
                    <input type="submit" name="submit" value="Yes">
                    <a href="events.php">No</a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>