<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $estado=$_POST['estado'];

  

    $actualizar="UPDATE reserva SET Codigo'$codigo', Id_Vuelo='$estado' WHERE Id_Reserva='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultareserva.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarReserva.php';
        </script>";
    }
?>