<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $matricula=$_POST['matricula'];
    $modelo=$_POST['modelo'];
    $capacidad=$_POST['capacidad'];
    $tamanio=$_POST['tamanio'];
    $tipo=$_POST['tipo'];
    $area=$_POST['area'];
  

    $actualizar="UPDATE aeronave SET Matricula='$matricula', Modelo='$modelo', Capacidad='$capacidad', Tamaño='$tamanio', Tipo='$tipo', Area='$area' WHERE Id_Aeronave='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
      }catch(Exception $e) {
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
     
        $fecha=explode("/", $datos2);
        
         $path = "ActualizarAeronave-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
         error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
     }

 

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaseronaves.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultaseronaves.php';
        </script>";
    }
?>