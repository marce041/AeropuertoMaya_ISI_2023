<?php
//codigo de conexion
$servername="localhost";
$username="root";
$password="root";
$database="aeropuertomaya";


$conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("conexion fallida: ".mysqli_connect_error());
    }
?>