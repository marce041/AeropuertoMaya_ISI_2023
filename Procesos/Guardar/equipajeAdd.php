<?php
    include ("../../conexion.php");
    
    $peso=$_POST['peso'];
    $cantidad=$_POST['cantidad'];
    $multiplicadorprecio=$_POST['multiplicadorprecio'];


    $insertar="INSERT INTO `equipaje` (`Id_Equipaje`, `Peso`, `Cantidad`, `MultiplicadorPrecio`) 
    VALUES (NULL, '$peso', '$cantidad', '$multiplicadorprecio');";

    date_default_timezone_set('America/Mexico_City');

    try {
    $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {

    $path = "temp/logGuardarEquipaje.txt";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
    }

    // echo "<script> alert('".$cargaacademica."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/equipaje.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../DatosMaestros/equipaje.php';
        </script>";
    }
?>