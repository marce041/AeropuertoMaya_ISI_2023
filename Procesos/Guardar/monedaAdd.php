<?php
    include ("../../conexion.php");

    $nombre=$_POST['nombre'];
    $conversionadolar=$_POST['conversionadolar'];


    $insertar="INSERT INTO `moneda` (`Id_Moneda`, `Nombre`, `ConversionADolar`) 
    VALUES (NULL, '$nombre', '$conversionadolar');";

    $resultado=mysqli_query($conn, $insertar);

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/moneda.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>