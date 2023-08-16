<?php
include 'checkLogin.php';
include '../config/database.php';
$table="message_tbl";
$conn = new database();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages Details</title>
    <?php include '../includes/links-dashboard.php'; ?>

    <style>

    </style>

</head>

<body>
    <?php include '../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="messages">
                <h2>Messages</h2>

                <div class="message-box">
                    <?php
                        $data = $conn->select($table, "*");
                        foreach($data as $row){
                            echo "<div class='message-card'>";
                            echo "<div class='overlay'></div>";
                            echo "<div class='delete-btn'><a href='message-details.php?message_id=".$row['message_id']."'>Remove</a></div>";
                            echo "<p><b>Name: </b>".$row['name']."</p>";
                            echo "<p><b>Phone: </b>".$row['phone']."</p>";
                            echo "<p><b>Email: </b>".$row['email']."</p>";
                            echo "<p><b>Subject: </b>".$row['subject']."</p>";
                            echo "<div class='msg'>".$row['message']."</div>";
                            echo "</div>";
                        }


                        //CODE TO DELETE THE MESSAGE
                        if(isset($_GET['message_id'])){
                            $message_id = $_GET['message_id'];
                            $conn->delete($table, "message_id = ".$message_id);
                        }
                        
                        ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>