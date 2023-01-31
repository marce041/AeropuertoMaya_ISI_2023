<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM parametro WHERE Id_Parametro='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaparametro.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaparametro.php';
        </script>";
    
    }

?>