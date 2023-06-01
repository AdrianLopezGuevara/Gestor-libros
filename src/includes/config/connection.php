<?php
$hostname = 'localhost';
$username = 'root';
$password = 'admin';
$database = 'libreria';
/* $port;
$socket; */

$connection = mysqli_connect($hostname, $username, $password, $database);
if (!$connection) {
    echo ("Error en al conexión a la base");
    exit;
}