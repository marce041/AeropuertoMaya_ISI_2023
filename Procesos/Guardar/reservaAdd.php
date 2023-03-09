<?php
    include ("../../conexion.php");

    $codigo=$_POST['codigo'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    
   

    $insertar="INSERT INTO `reserva` (`Id_Reserva`, `Codigo`, `Pasajero`,`Estado`) 
    VALUES (NULL, '$codigo', '$estado', '1');";

    

    // echo "<script> alert('".$nombre."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
        }catch(Exception $e) {
    
        $path = "temp/logGuardarReserva.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        }   
    

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/reserva.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../DatosMaestros/reserva.php';
        </script>";
    }
?>