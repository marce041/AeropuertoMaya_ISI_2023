<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM tripulacion WHERE Id_Tripulacion='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultatripulacion.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultatripulacion.php';
        </script>";
    
    }

?>