<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM checkin WHERE Id_Checkin='$id'";
    $resultado=mysqli_query($conn,$eliminar);


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