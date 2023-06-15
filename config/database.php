<?php

class database
{
    public $que;
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "rems_project";
    private $result = [];
    private $mysqli = "";

    public $sql;

    public function __construct()
    {
        try {
            $this->mysqli = new mysqli(
                $this->server,
                $this->username,
                $this->password,
                $this->dbname
            );
        } catch (Exception $e) {
            echo "Caught exception: ", $e->getMessage(), "\n";
        }
    }

    public function insert($table, $parameter = [])
{
    $table_columns = implode(",", array_keys($parameter));
    $table_values = array_values($parameter);

    // Create placeholders for values
    $placeholders = implode(',', array_fill(0, count($table_values), '?'));

    try {
        $sql = "INSERT INTO $table($table_columns) VALUES($placeholders)";

        // Prepare the statement
        $stmt = $this->mysqli->prepare($sql);

        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $this->mysqli->error);
        }

        // Bind the values to the prepared statement
        $types = str_repeat('s', count($table_values)); // Assuming all values are strings
        $stmt->bind_param($types, ...$table_values);

        // Execute the statement
        $result = $stmt->execute();

        // Check for successful execution
        if ($result) {
            return true;
        } else {
            throw new Exception("Failed to execute statement: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "<br>Caught exception: ", $e->getMessage(), "\n";
        echo "<br>SQL: ", $sql, "\n";
        return false;
    }
}


    public function update($table, $parameter = [], $id)
    {
        $args = [];

        foreach ($parameter as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(",", $args);

        $sql .= " WHERE $id";
        $return = false;
        try {
            $result = $this->mysqli->query($sql);
            $return = true;
        } catch (Exception $e) {
            echo "<br>Caught exception: ", $e->getMessage(), "\n";
            echo "<br>SQL: ", $sql, "\n";

        }
        return $return;
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";

        $return = false;
        try {
            $result = $this->mysqli->query($sql);
            $return = true;
        } catch (Exception $e) {
            echo "<br>Caught exception: ", $e->getMessage(), "\n";
            echo "<br>SQL: ", $sql, "\n";

        }
        return $return;
    }

    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        $result = $this->mysqli->query($sql);
        $results = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }

        return $results;
    }

    // public function print_table($data, $info = ""){
    //     echo '<table>';
    //     echo '<tr>';
    //     echo '<th>Status</th>';
    //     echo '<th>ID</th>';
    //     echo '<th>Event</th>';
    //     echo '<th>Description</th>';
    //     echo '<th colspan="2">Action</th>';
    //     echo '</tr>';
        
    //     foreach ($data as $row) {
    //         $eventId = $row['id'];
    //         $eventStatus = $row['status'];
    //         $eventTitle = $row['event'];
    //         $eventDescription = $row['description'];
        
    //         echo '<tr>';
    //         echo '<td>';
    //         echo '<div class="toggle-btn">';
    //         echo '<input type="checkbox" name="checkbox" id="toggle-button-' . $eventId . '" ' . ($eventStatus == 1 ? 'checked' : '') . '>';
    //         echo '<label for="toggle-button-' . $eventId . '"></label>';
    //         echo '</div>';
    //         echo '</td>';
    //         echo '<td>' . $eventId . '</td>';
    //         echo '<td>' . $eventTitle . '</td>';
    //         echo '<td>' . $eventDescription . '</td>';
    //         echo '<td>';
    //         echo '<div class="buttons">';
    //         echo '<a href="edit-event.php?id=' . $eventId . '">Edit</a>';
    //         echo '<a href="delete-event.php?id=' . $eventId . '">Delete</a>';
    //         echo '</div>';
    //         echo '</td>';
    //         echo '</tr>';
    //     }

    // }

    public function print_table($data, $info = "") {        
        foreach ($data as $row) {
            $eventId = $row['id'];
            $eventStatus = $row['status'];
            $eventTitle = $row['event'];
            $eventDescription = $row['description'];
            $eventPhoto = $row['photo'];
    
            echo '<tr>';
            // Hide toggle button if delete operation is requested
            if ($info !== "delete") {
                echo '<td>';
                echo '<div class="toggle-btn">';
                echo '<input type="checkbox" name="checkbox" id="toggle-button-' . $eventId . '" ' . ($eventStatus == 1 ? 'checked' : '') . '>';
                echo '<label for="toggle-button-' . $eventId . '"></label>';
                echo '</div>';
                echo '</td>';
            }
            echo '<td>' . $eventId . '</td>';
            echo '<td>' . $eventTitle . '</td>';
            echo '<td>' . $eventDescription . '</td>';
            echo '<td><img src="uploadedImages/' . $eventPhoto. '" alt="EventPhoto" width="100"></td>';
            // Hide edit and delete buttons if delete operation is requested
            if ($info !== "delete") {
                echo '<td>';
                echo '<div class="buttons">';
                echo '<a href="edit-event.php?id=' . $eventId . '">Edit</a>';
                echo '<a href="delete-event.php?id=' . $eventId . '">Delete</a>';
                echo '</div>';
                echo '</td>';
            }
            echo '</tr>';
        }
        
    }
    
    


    public function __destruct()
    {
        $this->mysqli->close();
    }

}




?>