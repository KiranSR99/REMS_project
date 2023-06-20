<?php
include '../../config/database.php';
$table = "packages_tbl";
$conn = new database();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["eventId"]) && isset($_POST["status"])) {
        $eventId = $_POST["eventId"];
        $status = $_POST["status"];

        $data = [
            'status' => $status,
        ];
        $where = "id=" . $eventId;
        $res = $conn->update($table, $data, $where);
        if ($res) {
            echo "Status updated successfully.";
        } else {
            echo "Error updating status.";
        }
    }
}
?>