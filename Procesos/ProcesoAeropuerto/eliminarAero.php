<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM aeropuerto WHERE Id_Aeropuerto='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaaeropuertos.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaaeropuertos.php';
        </script>";
    
    }

?>