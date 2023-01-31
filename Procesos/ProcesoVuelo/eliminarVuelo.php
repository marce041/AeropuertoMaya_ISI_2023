<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM vuelo WHERE Id_Vuelo='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultavuelo.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultavuelo.php';
        </script>";
    
    }

?>