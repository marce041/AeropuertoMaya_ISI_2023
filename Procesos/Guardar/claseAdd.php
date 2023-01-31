<?php
    include ("../../conexion.php");

   
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $descripcion=$_POST['descripcion'];
    $multiplicadorprecio=$_POST['multiplicadorprecio'];


    $insertar="INSERT INTO `clase` (`Id_Clase`, `Tipo_Clase`, `Descripcion`, `MultiplicadorPrecio`) 
    VALUES (NULL, '$estado2','$descripcion', '$multiplicadorprecio');";

    $resultado=mysqli_query($conn, $insertar);

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/clase.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>