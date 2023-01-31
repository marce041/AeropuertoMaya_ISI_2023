<?php
    include ("../../conexion.php");

    $codigo=$_POST['codigo'];
    $capacidad=$_POST['capacidad'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
   
    
    $insertar="INSERT INTO `hangar` (`Id_Hangar`, `Codigo`,`Capacidad`, `Id_Aeronave`,`Id_Aeropuerto`) 
    VALUES (NULL, '$codigo','$capacidad', '$estado','$estado2');";

    $resultado=mysqli_query($conn, $insertar);

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/aeronave.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>