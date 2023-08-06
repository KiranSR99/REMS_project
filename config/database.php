<?php

class database
{
    public $que;
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "rems_project";
    private $result = [];
    public $mysqli = "";

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

    public function select($table, $rows = "*", $where = null, $orderBy = null)
{
    $sql = "SELECT $rows FROM $table";

    if ($where != null) {
        $sql .= " WHERE $where";
    }

    if ($orderBy != null) {
        $sql .= " ORDER BY $orderBy";
    }

    $result = $this->mysqli->query($sql);
    $results = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $results[] = $row;
    }

    return $results;
}


    
    public function print_table($data, $info = "", $columns = [], $deletePage = "", $editPage = "")
{
    foreach ($data as $row) {
        $rowId = $row['id'];

        echo '<tr>';
        // Hide toggle button if delete operation is requested
        if ($info !== "delete") {
            echo '<td>';
            echo '<div class="toggle-btn">';
            echo '<input type="checkbox" name="checkbox" id="toggle-button-' . $rowId . '" ' . ($row['status'] == 1 ? 'checked' : '') . ' onchange="updateStatus(' . $rowId . ', this)">';
            echo '<label for="toggle-button-' . $rowId . '"></label>';
            echo '</div>';
            echo '</td>';
        }

        foreach ($columns as $column) {
            if ($column === 'photo') {
                echo '<td><img src="../uploadedImages/' . $row[$column] . '" alt="EventPhoto" width="100"></td>';
            } else {
                echo '<td>' . $row[$column] . '</td>';
            }
        }

        // Hide edit and delete buttons if delete operation is requested
        if ($info !== "delete") {
            echo '<td>';
            echo '<div class="buttons">';
            echo '<a href="' . $editPage . '?id=' . $rowId . '">Edit</a>';
            echo '<a href="' . $deletePage . '?id=' . $rowId . '">Delete</a>';
            echo '</div>';
            echo '</td>';
        }
        echo '</tr>';
    }
}



public function print_card($data, $titleColumn, $descriptionColumn, $photoColumn, $pageType, $idColumnName)
{
    $iteration = 0;

    foreach ($data as $row) {
        $title = $row[$titleColumn];
        $description = $row[$descriptionColumn];
        $photo = $row[$photoColumn];

        $detailPage = ($pageType === 'events') ? 'event-detail.php' : 'package-detail.php';

        echo '<section class="events">';
        echo '<div class="container">';

        if ($iteration % 2 === 0) {
            echo '<div class="card">';
            echo '<div class="column-1"><img src="dashboard/uploadedImages/' . $photo . '" alt="EventPhoto"></div>';
            echo '<div class="column-2">
                    <h1>' . $title . '</h1>
                    <p>' . $description . '</p>
                    <a class="btn" href="' . $detailPage . '?' . $idColumnName . '=' . $row['id'] . '">Find Out More</a>
                </div>';
            echo '</div>';
        } else {
            echo '<div class="card-reverse">';
            echo '<div class="card-reverse-column-1">
                    <h1>' . $title . '</h1>
                    <p>' . $description . '</p>
                    <a class="btn" href="' . $detailPage . '?' . $idColumnName . '=' . $row['id'] . '">Find Out More</a>
                </div>';
            echo '<div class="card-reverse-column-2"><img src="dashboard/uploadedImages/' . $photo . '" alt="EventPhoto"></div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</section>';

        $iteration++;
    }
}


    

    

    public function __destruct()
    {
        $this->mysqli->close();
    }

}


?>