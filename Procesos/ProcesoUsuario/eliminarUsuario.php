<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM usuario WHERE idUser='$id'";
    $resultado=mysqli_query($conn,$eliminar);


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