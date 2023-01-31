<?php
    include ("../../conexion.php");
    
    $codigo=$_POST['codigo'];
    $fecha=$_POST['fecha'];
    $puertaembarque=$_POST['puertaembarque'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
  


    $insertar="INSERT INTO `paseabordar` (`Id_Pase`, `Codigo`, `Fecha`, `Puerta_Embarque`, `Id_Boleto`, `Id_Pasajero`) 
    VALUES (NULL, '$codigo', '$fecha', '$puertaembarque', '$estado', '$estado2');";

    $resultado=mysqli_query($conn, $insertar);

    // echo "<script> alert('".$codigo."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/paseabordar.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>