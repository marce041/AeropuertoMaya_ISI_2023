<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM equipaje WHERE Id_Equipaje='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaequipaje.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaequipaje.php';
        </script>";
    
    }

?>