<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM pasajero WHERE Id_Pasajero='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultapasajeros.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultapasajeros.php';
        </script>";
    
    }

?>