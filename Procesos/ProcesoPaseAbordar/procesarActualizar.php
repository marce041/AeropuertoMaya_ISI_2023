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
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
     
        $fecha=explode("/", $datos2);
        
         $path = "ActualizarPaseAbordar-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
         error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
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