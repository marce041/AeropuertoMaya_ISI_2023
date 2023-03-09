<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $conversionadolar=$_POST['conversionadolar'];
  

    $actualizar="UPDATE moneda SET Nombre='$nombre',ConversionADolar='$conversionadolar' WHERE Id_Moneda='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $path = "logActualizarAeropuerto.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultamoneda.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarMoneda.php';
        </script>";
    }
?>