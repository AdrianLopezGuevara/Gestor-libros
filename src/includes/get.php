<?php

$query = "SELECT * FROM libros;";

require './config/connection.php';
$request = mysqli_query($connection, $query);
if ($request) {

    $data = mysqli_fetch_all($request);
    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo ($json);
} else {
    echo json_encode("Error");
}