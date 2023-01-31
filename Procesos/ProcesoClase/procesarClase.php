<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $tipoclase=$_POST['estado2'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    
  

    $actualizar="UPDATE clase SET Tipo_Clase='$tipoclase', Descripcion='$descripcion', MultiplicadorPrecio='$precio' WHERE Id_Clase='$id'";

    $resultado=mysqli_query($conn,$actualizar);

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
        window.location = 'actualizarClase.php';
        </script>";
    }
?>