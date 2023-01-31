<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM paseabordar WHERE Id_Pase='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultapaseabordar.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultapaseabordar.php';
        </script>";
    
    }

?>