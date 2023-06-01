<?php
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$archivo = $_FILES['archivo'];
$portada = $_FILES['portada'];

$carpetaArchivos = '../../archivos/';
if (!is_dir($carpetaArchivos)) {
    mkdir($carpetaArchivos);
}
$carpetaPortadas = '../../portadas/';
if (!is_dir($carpetaPortadas)) {
    mkdir($carpetaPortadas);
}
$nombreArchivo = md5(uniqid()) . ".pdf";
$nombrePortada = md5(uniqid()) . ".webp";

move_uploaded_file($archivo['tmp_name'], $carpetaArchivos . $nombreArchivo);
move_uploaded_file($portada['tmp_name'], $carpetaPortadas . $nombrePortada);

$query = "INSERT INTO `libros` (`titulo`, `autor`, `fecha`, `archivo`, `portada`) VALUES('$titulo', '$autor', '$fecha','$nombreArchivo','$nombrePortada');";

require './config/connection.php';
$request = mysqli_query($connection, $query);
if ($request) {
    header('Location: ../../index.html');
} else {
    echo ("Error");
}