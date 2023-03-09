<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $fecha=$_POST['fecha'];
    $puertaembarque=$_POST['puertaembarque'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];
  

    $actualizar="UPDATE paseabordar SET Codigo='$codigo', Fecha='$fecha', Puerta_Embarque='$puertaembarque', Id_Boleto='$estado', Id_Pasajero='$estado2' WHERE Id_Pase='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $path = "temp/logActualizarPaseAbordar.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   
 

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
        window.location = '../../Consultas/Consultapaseabordar.php';
        </script>";
    }
?>