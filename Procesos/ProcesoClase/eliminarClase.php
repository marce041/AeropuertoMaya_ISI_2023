<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM clase WHERE Id_Clase='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaclase.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaclase.php';
        </script>";
    
    }

?>