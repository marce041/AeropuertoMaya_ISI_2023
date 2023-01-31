<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM aeronave WHERE Id_Aeronave='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaseronaves.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaseronaves.php';
        </script>";
    
    }

?>