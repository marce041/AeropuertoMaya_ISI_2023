<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $cai=$_POST['cai'];
    $fecha_ven=$_POST['fecha_ven'];
    $fecha_emi=$_POST['fecha_emi'];
    $rango_ini=$_POST['rango_ini'];
    $rango_fin=$_POST['rango_fin'];
    $consecutivo=$_POST['consecutivo'];
   
  

    $actualizar="UPDATE parametro SET Cai='$cai', Fecha_Ven='$fecha_ven', Fecha_Emi='$fecha_emi', Rango_Ini='$rango_ini', Rango_Fin='$rango_fin', Consecutivo='$consecutivo' WHERE Id_Parametro='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaparametro.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarParametro.php';
        </script>";
    }
?>