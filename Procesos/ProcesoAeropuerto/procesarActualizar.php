<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $hangar=$_POST['hangar'];
    $ciudad=filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
  

    $actualizar="UPDATE aeropuerto SET Nombre='$nombre', Hangar='$hangar', Id_Ciudad='$ciudad' WHERE Id_Aeropuerto='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaaeropuertos.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarAero.php';
        </script>";
    }
?>