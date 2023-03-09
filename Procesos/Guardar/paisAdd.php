<?php

    include ("../../conexion.php");
    
    $nombre=$_POST['nombre'];
    $estad = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);



    $insertar="INSERT INTO `pais` (`Ipp`, `Nombre`, `Region`) 
    VALUES (NULL, '$nombre', '$estado');";

    $resultado=mysqli_query($conn, $insertar);

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/pais.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }

?>





