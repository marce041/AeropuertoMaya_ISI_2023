<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $capacidad=$_POST['capacidad'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];
  

    $actualizar="UPDATE hangar SET Codigo='$codigo', Capacidad='$capacidad', Id_Aeronave='$estado', Id_Aeropuerto='$estado2' WHERE Id_Hangar='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $path = "temp/logActualizarHangar.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultahangar.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultahangar.php';
        </script>";
    }
?>