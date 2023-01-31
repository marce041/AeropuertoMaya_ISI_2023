<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $cargaacademica=$_POST['cargaacademica'];
    $cargo=$_POST['cargo'];
    
  

    $actualizar="UPDATE personaltierra SET Carga_Academica='$cargaacademica', Cargo='$cargo' WHERE Id_Personal='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultapersonaltierra.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarPersonalTierra.php';
        </script>";
    }
?>