<?php
    include ("../../conexion.php");

    $nombre=$_POST['nombre'];
    $hangar=$_POST['hangar'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);



    $insertar="INSERT INTO `aeropuerto` (`Id_Aeropuerto`, `Nombre`, `Hangar`, `Id_Ciudad`) 
    VALUES (NULL, '$nombre', '$hangar', '$estado');";

    
    
    try {
        $resultado=mysqli_query($conn, $insertar);
     }catch(Exception $e) {
    
        $path = "logGuardarAeronave.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   






    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/aeropuerto.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>