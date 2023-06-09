<!DOCTYPE html>
<html lang="en">

<head>

    <?php
include 'checkLogin.php';
include '../config/database.php';
$table = "adminLoginHistory";
$conn = new database();

$login_expiry = "";
$last_login_date = "";
// $id = $_SESSION['id'];
// echo $id;


$expiryData = $conn->select("admin_tbl", "*");
if (!empty($expiryData)) {
    $last_login_date = $expiryData[0]['last_login'];
    $login_expiry = $expiryData[0]['login_expiry'];
}
?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../includes/links-dashboard.php'; ?>

    <style>
    h3,
    .expiry {
        background-color: green;
        padding: 10px;
        margin-top: 20px;
        text-align: center;
        color: #fff;
    }

    .expiry {
        background-color: red;
    }
    </style>

</head>

<body>
    <?php
    include '../includes/dashboard-aside.php';
    ?>

    <div class="main-content">
        <h3>Last Login Date: <?php echo $last_login_date; ?></h3>
        <h3 class="expiry">Login Expiry: <?php echo $login_expiry; ?></h3>
        <div class="container">
            <table>
                <tr>
                    <th>SN</th>
                    <th>Login Date</th>
                </tr>

                <?php
                $count = 1;
                $data = $conn->select($table, "*",null, "login_id DESC");

                if ($data) {
                    foreach ($data as $row) {
                        $login_date = $row['login_date'];

                        echo '<tr>';
                        echo '<td>' . $count . '</td>';
                        echo '<td>' . $login_date . '</td>';
                        echo '</tr>';

                        $count++;
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>