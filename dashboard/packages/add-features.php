<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../checkLogin.php';
include '../../config/database.php';
$table = "package_features";
$conn = new database();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Feature</title>
    <?php include '../../includes/links-dashboard.php'; ?>
</head>

<body>
    <?php
    include '../../includes/dashboard-aside.php';

    $id = $_GET['id'];

    $res = false; // Initialize $res to false

    if (isset($_POST['submit'])) {
        $feature = $_POST['feature'];
        $description = $_POST['description'];

        // Loop through the dynamically generated fields
        foreach ($feature as $index => $value) {
            // Insert each feature and description into the database
            $data = [
                'package_id' => $id,
                'feature' => $feature[$index],
                'feature_desc' => $description[$index]
            ];

            $res = $conn->insert($table, $data);
        }

        if ($res == true) {
            // Redirect after successful insertion
            // header('packages.php');
            exit(); // Make sure to exit after redirecting
        }
    }
    ?>

    <div class="main-content">
        <div class="container">
            <div class="event-form">
                <h1>Add Feature</h1>
                <form class="add-feature-form" method="POST" action="">
                    <div id="featureContainer">
                        <div class="feature-and-desc">
                            <div class="form-group">
                                <label for="feature">Feature</label>
                                <textarea type="text" name="feature[]" placeholder="Enter a feature"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description[]" placeholder="Enter a description"></textarea>
                            </div>
                        </div>
                    </div>

                    <button class="btn" type="button" onclick="addInputField()">+ Add More</button>
                    <button class="btn" name="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function addInputField() {
        const featureContainer = document.getElementById('featureContainer');

        const newFeatureDiv = document.createElement('div');
        newFeatureDiv.className = 'feature-and-desc';

        const featureFormGroup = document.createElement('div');
        featureFormGroup.className = 'form-group';
        const featureLabel = document.createElement('label');
        featureLabel.textContent = 'Feature';
        const featureTextarea = document.createElement('textarea');
        featureTextarea.type = 'text';
        featureTextarea.name = 'feature[]'; // Updated field name
        featureTextarea.placeholder = 'Enter a feature';
        featureFormGroup.appendChild(featureLabel);
        featureFormGroup.appendChild(featureTextarea);

        const descriptionFormGroup = document.createElement('div');
        descriptionFormGroup.className = 'form-group';
        const descriptionLabel = document.createElement('label');
        descriptionLabel.textContent = 'Description';
        const descriptionTextarea = document.createElement('textarea');
        descriptionTextarea.type = 'text';
        descriptionTextarea.name = 'description[]'; // Updated field name
        descriptionTextarea.placeholder = 'Enter a description';
        descriptionFormGroup.appendChild(descriptionLabel);
        descriptionFormGroup.appendChild(descriptionTextarea);

        newFeatureDiv.appendChild(featureFormGroup);
        newFeatureDiv.appendChild(descriptionFormGroup);

        featureContainer.appendChild(newFeatureDiv);
    }
    </script>

</body>

</html>