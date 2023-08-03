<?php
include './dashboard/checkLogin.php';
include './config/database.php';
$table = "packages_tbl";
$table2 = "package_features";
$conn = new database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include './includes/links.php'; ?>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <div class="package-card">
        <?php
        $packageID = $_GET['packageID'];
        $data = $conn->select($table, "*","id = $packageID");
        foreach ($data as $row) {
            echo "<div class='image-div'><img src='./dashboard/uploadedImages/" . $row['photo'] . "' alt='PackagePhoto'></div>";
            echo "<div class='text'>";
            echo "<h2>".$row['package']."</h2>";
            echo "<p>".$row['description']."</p>";
            echo "<button class='btn' type='submit'>Book Now</button>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="container">
        <div class="package-detail">
            <div class="left">
                <h3>The package includes:</h3>
                <!-- <div class="feature">
                    <h4>Private consultation with the Ayurvedic Doctor</h4>
                    <p>Consult our Ayurvedic Doctor to acquire knowledge of our ancient health care principles and
                        wisdom</p>
                </div>
                <div class="feature">
                    <h4>Daily Yoga and Meditation session</h4>
                    <p>Sign up for our routine classes and explore the benefits of these ancient lifestyle arts</p>
                </div>
                <div class="feature">
                    <h4>Spa Cuisine (Breakfast, Lunch or Dinner)</h4>
                    <p>Enhance your experience with meals that are nutritious and thoughtfully prepared to help you
                        maintain a healthy balance between your mind and body</p>
                </div>
                <div class="feature">
                    <h4>One Stress Relieving Massage</h4>
                    <p>Relieve the tension in your body and de-stress with this invigorating massage</p>
                </div>
                <div class="feature">
                    <h4>One Herbal Body Scrub with Steam bath</h4>
                    <p>Relax and revive with this harmonious combination of herbal body scrub with unique skin
                        rejuvenating herbs, followed by a revitalizing steam bath</p>
                </div>
                <div class="feature">
                    <h4>One session of Shirodhara</h4>
                    <p>Calm and purify your mind with this ancient healing practice performed in the Himalayas for
                        centuries</p>
                </div>
                <div class="feature">
                    <h4>One session of Pada Avayanga</h4>
                    <p>Relax with this stimulating and soothing massage of the legs, feet and ankles</p>
                </div>
                <div class="feature">
                    <h4>Use of Fitness Centre, Swimming Pool, Meditation Maze, Chakra Sound Therapy Chambers, Himalayan
                        Rock
                        Salt Room, Garden of Nine Planets along with painting and pottery classes
                    </h4>
                </div> -->


                <?php
                // $data2 = $conn->select($table2, "*", "id = $packageID");
                
                // Commented out the previous select() function call
                
                $sql = "SELECT f.feature, f.feature_desc FROM $table2 f WHERE f.package_id = $packageID";
                
                $result = $conn->mysqli->query($sql);
                
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='feature'>";
                        echo "<h4>" . $row['feature'] . "</h4>";
                        echo "<p>" . $row['feature_desc'] . "</p>";
                        echo "</div>";
                    }
                }
                ?>

            </div>
            <div class="right">
                <table rules="all">
                    <tr>
                        <th>Room Category</th>
                        <th>Single Occupancy</th>
                        <th>Double Occupancy</th>
                    </tr>
                    <tr>
                        <td>Junior Suite - Non Attached Terrace</td>
                        <td>Rs. 5000</td>
                        <td>Rs. 5000</td>
                    </tr>
                    <tr>
                        <td>Junior Suite - Attached Terrace</td>
                        <td>Rs. 5000</td>
                        <td>Rs. 5000</td>
                    </tr>
                    <tr>
                        <td>Executive Suite - Garden</td>
                        <td>Rs. 5000</td>
                        <td>Rs. 5000</td>
                    </tr>
                    <tr>
                        <td>Executive Suite - Terrace</td>
                        <td>Rs. 5000</td>
                        <td>Rs. 5000</td>
                    </tr>
                    <tr>
                        <td>Royal Suite</td>
                        <td>Rs. 5000</td>
                        <td>Rs. 5000</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>



    <?php include './includes/footer.php'; ?>
</body>

</html>