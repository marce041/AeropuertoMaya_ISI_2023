<?php
//codigo de conexion
$servername="localhost";
$username="root";
$password="";
$database="aeropuertomaya";

date_default_timezone_set('America/Mexico_City');

try {
    $conn = mysqli_connect($servername, $username, $password, $database);
 }catch(Exception $e) {

    $path = "logsAero.txt";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
 }   


?>