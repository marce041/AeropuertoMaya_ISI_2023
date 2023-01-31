<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $peso=$_POST['peso'];
    $cantidad=$_POST['cantidad'];
    $multiplicadorprecio=$_POST['multiplicadorpre'];
  

    $actualizar="UPDATE equipaje SET Peso='$peso', Cantidad='$cantidad', MultiplicadorPrecio='$multiplicadorprecio' WHERE Id_Equipaje='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultaequipaje.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarEquipaje.php';
        </script>";
    }
?>