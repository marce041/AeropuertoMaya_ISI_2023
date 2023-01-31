<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM personaltierra WHERE Id_Personal='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultapersonaltierra.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultapersonaltierra.php';
        </script>";
    
    }

?>