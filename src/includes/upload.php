<?php
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$archivo = $_FILES['archivo'];

$carpeta = '../../archivos/';
if (!is_dir($carpeta)) {
    mkdir($carpeta);
}
$nombreArchivo = md5(uniqid()) . ".pdf";
move_uploaded_file($archivo['tmp_name'], $carpeta . $nombreArchivo);

$query = "INSERT INTO `libros` (`titulo`, `autor`, `fecha`, `archivo`) VALUES('$titulo', '$autor', '$fecha','$nombreArchivo');";

require './config/connection.php';
$request = mysqli_query($connection, $query);
if ($request) {
    header('Location: ../../index.html');
} else {
    echo ("Error");
}