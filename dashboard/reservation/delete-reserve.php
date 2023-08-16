<?php
include '../../config/database.php';
$table = "reservation_tbl";
$conn = new database();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details</title>
    <?php include '../../includes/links-dashboard.php'; ?>

</head>

<body>
    <?php include '../../includes/dashboard-aside.php'; ?>
    <div class="main-content">
        <div class="container">
            <table>
                <?php
                if (isset($_POST["submit"])) {
                    if ($conn->delete($table, "reserve_id=" . $_POST["reserve_id"])) {
                        header('location:reservation.php');
                    } else {
                        echo "Issue in deleting data";
                    }
                }
                if (isset($_GET['reserve_id'])) {
                    $data = $conn->select($table, "*", "reserve_id=" . $_GET['reserve_id']);
                    $columns = ['reserve_id','reserve_name', 'selected_date','fullname'];
                    // $conn->print_table($data,"delete",$columns);

                    foreach ($data as $row) {
                        $rowId = $row['reserve_id'];
                
                        echo '<tr>';

                        foreach ($columns as $column) {
                            if ($column === 'photo') {
                                echo '<td><img src="../uploadedImages/' . $row[$column] . '" alt="EventPhoto" width="100"></td>';
                            } else {
                                echo '<td>' . $row[$column] . '</td>';
                            }
                        }
                
                        echo '</tr>';
                    }
                }
                
                ?>
            </table>
            <?php if (isset($_GET['reserve_id'])) : ?>
            <form class="delete-form" method="post" action="delete-reserve.php">
                <p>Are you sure you want to delete this data?</p>
                <input type="hidden" name="reserve_id" value="<?php echo $_GET['reserve_id']; ?>">
                <div class="delete-buttons">
                    <input type="submit" name="submit" value="Yes">
                    <a href="reservation.php">No</a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>