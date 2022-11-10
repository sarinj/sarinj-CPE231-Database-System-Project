<?php

include('connect.php');

$country_id = isset($_POST['country_id']) ? $_POST['country_id'] : 0;
$command = isset($_POST['get']) ? $_POST['get'] : "";

switch ($command) {
    case "country":
        $statement = "SELECT country_id,country_name FROM country";
        $dt = mysqli_query($conn, $statement);
        while ($result = mysqli_fetch_array($dt)) {
            echo $result1 = "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
        }
        break;
}

exit();
?>