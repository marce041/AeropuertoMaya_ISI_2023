<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM pais WHERE Id_Pais='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultapaises.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultapaises.php';
        </script>";
    
    }

?>