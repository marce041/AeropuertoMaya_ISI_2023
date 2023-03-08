<?php
    include ("../../conexion.php");
    
    $nombre=$_POST['nombre'];
    $codigo=$_POST['codigo'];
    $terminal=$_POST['terminal'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);



    $insertar="INSERT INTO `ciudad` (`Id_Ciudad`, `Nombre`, `Codigo`, `Terminal`, `Id_Pais`) 
    VALUES (NULL, '$nombre', '$codigo', '$terminal', '$estado');";

    

    // echo "<script> alert('".$nombre."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
        }catch(Exception $e) {
    
        $path = "logGuardarCiudad.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        }   

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/ciudad.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>