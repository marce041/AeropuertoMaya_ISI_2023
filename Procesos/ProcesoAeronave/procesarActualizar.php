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
    
        $path = "logActualizarAeronave.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
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
        window.location = 'actualizarNave.php';
        </script>";
    }
?>