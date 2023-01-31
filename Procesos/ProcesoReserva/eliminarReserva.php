<?php
include("../../conexion.php");

    $id=$_GET['id'];
    $eliminar="DELETE FROM reserva WHERE Id_Reserva='$id'";
    $resultado=mysqli_query($conn,$eliminar);


    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultareserva.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultareserva.php';
        </script>";
    
    }

?>