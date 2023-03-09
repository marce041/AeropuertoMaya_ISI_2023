<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $tipoclase=$_POST['estado2'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    
  

    $actualizar="UPDATE clase SET Tipo_Clase='$tipoclase', Descripcion='$descripcion', MultiplicadorPrecio='$precio' WHERE Id_Clase='$id'";

    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $path = "temp/logActualizarClase.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaclase.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultaclase.php';
        </script>";
    }
?>