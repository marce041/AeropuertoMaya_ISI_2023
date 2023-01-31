<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM ciudad WHERE Id_Ciudad='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaciudades.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaciudades.php';
        </script>";
    
    }

?>