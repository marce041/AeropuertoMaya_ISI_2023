<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $codigo=$_POST['codigo'];
    $terminal=$_POST['terminal'];
    
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);


  

    $actualizar="UPDATE ciudad SET Nombre='$nombre', Codigo='$codigo', Terminal='$terminal', Id_Pais='$estado' WHERE Id_Ciudad='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $path = "temp/logActualizarPase.txt";
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
        window.location = 'actualizarCiudad.php';
        </script>";
    }
?>