<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];

  

    $actualizar="UPDATE checkin SET Id_Reserva='$estado', Id_Pasajero='$estado2' WHERE Id_Checkin='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultacheckin.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarCheckin.php';
        </script>";
    }
?>