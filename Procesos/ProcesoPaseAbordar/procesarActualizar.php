<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $fecha=$_POST['fecha'];
    $puertaembarque=$_POST['puertaembarque'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];
  

    $actualizar="UPDATE paseabordar SET Codigo='$codigo', Fecha='$fecha', Puerta_Embarque='$puertaembarque', Id_Boleto='$estado', Id_Pasajero='$estado2' WHERE Id_Pase='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultapaseabordar.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarPaseAbordar.php';
        </script>";
    }
?>