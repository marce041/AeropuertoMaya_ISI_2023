<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM hangar WHERE Id_Hangar='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultahangar.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultahangar.php';
        </script>";
    
    }

?>