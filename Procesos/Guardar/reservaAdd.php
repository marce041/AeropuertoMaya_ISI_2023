<?php
    include ("../../conexion.php");

    $codigo=$_POST['codigo'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $precio=$_POST['precio'];
   

    $insertar="INSERT INTO `reserva` (`Id_Reserva`, `Codigo`, `Id_Vuelo`, `Precio`) 
    VALUES (NULL, '$codigo', '$estado', '$precio');";

    $resultado=mysqli_query($conn, $insertar);

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/reserva.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>