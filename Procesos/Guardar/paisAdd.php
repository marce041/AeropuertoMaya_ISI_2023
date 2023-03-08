<?php
    include ("../../conexion.php");
    
    $nombre=$_POST['nombre'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);



    $insertar="INSERT INTO `pai` (`Id_Pais`, `Nombre`, `Region`) 
    VALUES (NULL, '$nombre', '$estado');";

    date_default_timezone_set('America/Mexico_City');

    try {
    $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {

    $path = "temp/logGuardarPais.txt";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
    }

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/pais.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../DatosMaestros/pais.php';
        </script>";
    }
?>