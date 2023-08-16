<?php
include '../checkLogin.php';
include '../../config/database.php';
$table="reservation_tbl";
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

    <style>
    .reservation-table td,
    .reservation-table th {
        font-size: 14px;
    }

    .reservation-table .expandable-cell {
        white-space: normal;
        overflow: hidden;
        max-height: 100px;
        width: 40%;
        transition: max-height 0.3s ease;
        cursor: pointer;
    }

    .reservation-table .expandable-cell.expanded {
        max-height: none;
    }
    </style>
</head>

<body>
    <?php include '../../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">

            <table class="reservation-table">
                <tr>
                    <th>ID</th>
                    <th>Reservation</th>
                    <th>Selected Dates</th>
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th class="expandable-cell">Additional Notes</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                $data = $conn->select($table,"*");
                $columns = ['reserve_id','reserve_name', 'selected_date','fullname', 'phone', 'email', 'additional_notes'];

                foreach ($data as $row) {
                    $rowId = $row['reserve_id'];
            
                    echo '<tr>';
                    
                    foreach ($columns as $index => $column) {
                        echo '<td';
                        if ($column === 'additional_notes') {
                            echo ' class="expandable-cell"';
                        }
                        echo '>';
            
                        if ($column === 'photo') {
                            echo '<img src="../uploadedImages/' . $row[$column] . '" alt="EventPhoto" width="100">';
                        } elseif ($column === 'additional_notes') {
                            echo '<div class="expandable-content">' . $row[$column] . '</div>';
                        } else {
                            echo $row[$column];
                        }
                        
                        echo '</td>';
                    }
            
                    echo '<td>';
                    echo '<div class="buttons">';
                    echo '<a href="edit-reserve.php?reserve_id=' . $rowId . '">Edit</a>';
                    echo '<a href="delete-reserve.php?reserve_id=' . $rowId . '">Delete</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".expandable-cell").click(function() {
            $(this).toggleClass("expanded");
        });
    });
    </script>
</body>

</html>