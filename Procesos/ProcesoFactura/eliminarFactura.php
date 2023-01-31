<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM factura WHERE Id_Factura='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultafactura.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultafactura.php';
        </script>";
    
    }

?>