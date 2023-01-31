<?php
    include ("../../conexion.php");

    $matricula=$_POST['matricula'];
    $modelo=$_POST['modelo'];
    $capacidad=$_POST['capacidad'];
    $tamanio=$_POST['tamanio'];
    $tipo=$_POST['tipo'];
    $area=$_POST['area'];


    $insertar="INSERT INTO `aeronave` (`Id_Aeronave`, `Matricula`, `Modelo`, `Capacidad`, `Tamaño`, `Tipo`, `Area`) 
    VALUES (NULL, '$matricula', '$modelo', '$capacidad', '$tamanio', '$tipo', '$area');";

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