<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM moneda WHERE Id_Moneda='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultamoneda.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultamoneda.php';
        </script>";
    
    }

?>