<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM personaltierra WHERE Id_Personal='$id'";
   

    try {
        $resultado=mysqli_query($conn,$eliminar);
     }catch(Exception $e) {
    
        $path = "temp/logEliminarPersonalTierra.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   
     
    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultapersonaltierra.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultapersonaltierra.php';
        </script>";
    
    }

?>