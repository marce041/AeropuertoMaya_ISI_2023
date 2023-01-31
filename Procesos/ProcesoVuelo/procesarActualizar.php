<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];
    $horasal=$_POST['horasal'];
    $horall=$_POST['horall'];
    $fecha=$_POST['fecha'];
    $precio=$_POST['precio'];
    $estado3=$_POST['estado3'];
  

    $actualizar="UPDATE vuelo SET Codigo='$codigo', Lugar_Salida='$estado', Lugar_LLegada='$estado2', Hora_Salida='$horasal', Hora_LLegada='$horall', Fecha='$fecha', Precio='$precio', Id_Aeronave='$estado3' WHERE Id_Vuelo='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultavuelo.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarvuelo.php';
        </script>";
    }
?>