<!-- <?php
include '../config/database.php';

$db = new database();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addEvent'])) {
        $eventTitle = $_POST['eventTitle'];
        $eventDescription = $_POST['eventDescription'];

        $db->insertEvent($eventTitle, $eventDescription);
    } elseif (isset($_POST['updateEvent'])) {
        $eventId = $_POST['eventId'];
        $eventTitle = $_POST['eventTitle'];
        $eventDescription = $_POST['eventDescription'];

        $db->updateEvent($eventId, $eventTitle, $eventDescription);
    } elseif (isset($_POST['deleteEvent'])) {
        $eventId = $_POST['eventId'];

        $db->deleteEvent($eventId);
    }
}

$events = $db->getAllEvents();
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
            <div class="add-event">
                <a href="add-event.php">Add Event</a>
            </div>
            <table>
                <tr>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Event</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                foreach ($events as $event) {
                    $eventId = $event['id'];
                    $eventStatus = $event['status'];
                    $eventTitle = $event['event'];
                    $eventDescription = $event['description'];
                
                    // Generate the row dynamically
                    echo '<tr class="clickable-row" data-href="another-page.html">';
                    echo '<td>';
                    echo '<div class="toggle-btn">';
                    echo '<input type="checkbox" name="checkbox" id="toggle-button-' . $eventId . '" ' . ($eventStatus == 1 ? 'checked' : '') . '>';
                    echo '<label for="toggle-button-' . $eventId . '"></label>';
                    echo '</div>';
                    echo '</td>';
                    echo '<td>' . $eventId . '</td>';
                    echo '<td>' . $eventTitle . '</td>';
                    echo '<td>' . $eventDescription . '</td>';
                    echo '<td>';
                    echo '<div class="buttons">';
                    echo '<a href="edit-event.php?id=' . $eventId . '">Edit</a>';
                    echo '<a href="delete-event.php?id=' . $eventId . '">Delete</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html> -->









<?php
class database
{
    public $que;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "demo";
    private $result = [];
    private $mysqli = "";

    public $sql;

    public function __construct()
    {
        try {
            $this->mysqli = new mysqli(
                $this->servername,
                $this->username,
                $this->password,
                $this->dbname
            );
        } catch (Exception $e) {
            echo "Caught exception: ", $e->getMessage(), "\n";
        }
    }

    public function insertEvent($eventTitle, $eventDescription)
    {
        $table = "events_tbl";
        $data = array(
            "event" => $eventTitle,
            "description" => $eventDescription
        );

        return $this->insert($table, $data);
    }

    public function updateEvent($eventId, $eventTitle, $eventDescription)
    {
        $table = "events_tbl";
        $data = array(
            "event" => $eventTitle,
            "description" => $eventDescription
        );
        $id = "id = '$eventId'";

        return $this->update($table, $data, $id);
    }

    public function deleteEvent($eventId)
    {
        $table = "events_tbl";
        $id = "id = '$eventId'";

        return $this->delete($table, $id);
    }

    public function getAllEvents()
    {
        $table = "events_tbl";

        return $this->select($table);
    }

    public function printEventsTable()
    {
        $events = $this->getAllEvents();

        echo '<table>';
        echo '<tr>';
        echo '<th>Status</th>';
        echo '<th>ID</th>';
        echo '<th>Event</th>';
        echo '<th>Description</th>';
        echo '<th colspan="2">Action</th>';
        echo '</tr>';

        foreach ($events as $event) {
            $eventId = $event['id'];
            $eventStatus = $event['status'];
            $eventTitle = $event['event'];
            $eventDescription = $event['description'];

            echo '<tr>';
            echo '<td>';
            echo '<div class="toggle-btn">';
            echo '<input type="checkbox" name="checkbox" id="toggle-button-' . $eventId . '" ' . ($eventStatus == 1 ? 'checked' : '') . '>';
            echo '<label for="toggle-button-' . $eventId . '"></label>';
            echo '</div>';
            echo '</td>';
            echo '<td>' . $eventId . '</td>';
            echo '<td>' . $eventTitle . '</td>';
            echo '<td>' . $eventDescription . '</td>';
            echo '<td>';
            echo '<div class="buttons">';
            echo '<a href="edit-event.php?id=' . $eventId . '">Edit</a>';
            echo '<a href="delete-event.php?id=' . $eventId . '">Delete</a>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}

?>






<?php
include '../config/database.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve event data from the form
    $eventTitle = $_POST['event'];
    $eventDescription = $_POST['description'];

    // Create an instance of the EventDatabase class
    $eventDB = new EventDatabase();

    // Add the event
    $result = $eventDB->insertEvent($eventTitle, $eventDescription);

    // Check the result of the operation
    if ($result) {
        // Event added successfully, redirect to the admin dashboard
        header('Location: events.php');
        exit();
    } else {
        // Error occurred while adding the event
        $errorMessage = "Error: " . mysqli_error($connection);
    }
}
?>

<!-- Rest of the HTML code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <?php include '../includes/links-dashboard.php'; ?>
</head>

<body>
    <?php include '../includes/dashboard-aside.php'; ?>

    <div class="main-content">
        <div class="container">
            <h1>Add Event</h1>
            <form method="POST" action="add-event.php">
                <div class="form-group">
                    <label for="event_title">Event Title:</label>
                    <input type="text" id="event_title" name="event" required>
                </div>
                <div class="form-group">
                    <label for="event_description">Event Description:</label>
                    <textarea id="event_description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Event">
                </div>
            </form>
        </div>
    </div>

</body>

</html>


















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
            <div class="add-event">
                <a href="add-event.php">Add Event</a>
            </div>
            <table>
                <tr>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Event</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                include '../config/database.php';
                
                $query = "SELECT * FROM events_tbl";
                $result = mysqli_query($conn, $query);
                
                if ($result) {
                    $count = 1;
                
                    while ($row = mysqli_fetch_assoc($result)) {
                        $eventId = $row['id'];
                        $eventStatus = $row['status'];
                        $eventTitle = $row['event'];
                        $eventDescription = $row['description'];
                    
                        // Generate the row dynamically
                        echo '<tr class="clickable-row" data-href="another-page.html">';
                        echo '<td>';
                        echo '<div class="toggle-btn">';
                        echo '<input type="checkbox" name="checkbox" id="toggle-button-' . $eventId . '" ' . ($eventStatus == 1 ? 'checked' : '') . '>';
                        echo '<label for="toggle-button-' . $eventId . '"></label>';
                        echo '</div>';
                        echo '</td>';
                        echo '<td>' . $count . '</td>';
                        echo '<td>' . $eventTitle . '</td>';
                        echo '<td>' . $eventDescription . '</td>';
                        echo '<td>';
                        echo '<div class="buttons">';
                        echo '<a href="edit-event.php?id=' . $eventId . '">Edit</a>';
                        echo '<a href="delete-event.php?id=' . $eventId . '">Delete</a>';
                        echo '</div>';
                        echo '</td>';
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