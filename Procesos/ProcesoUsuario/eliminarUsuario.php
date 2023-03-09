<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM usuario WHERE idUser='$id'";
    
    try {
        $resultado=mysqli_query($conn,$eliminar);
     }catch(Exception $e) {
    
        $path = "temp/logEliminarAeronave.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Seguridad/Consultausuarios.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Seguridad/Consultausuarios.php';
        </script>";
    
    }

?>