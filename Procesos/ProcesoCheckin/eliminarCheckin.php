<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM checkin WHERE Id_Checkin='$id'";
    

    try {
        $resultado=mysqli_query($conn,$eliminar);
     }catch(Exception $e) {
    
        $path = "temp/logEliminarCheckin.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultacheckin.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultacheckin.php';
        </script>";
    
    }

?>