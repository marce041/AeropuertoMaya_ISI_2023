<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $cargo=$_POST['cargo'];
    $horasvuelo=$_POST['horasvuelo'];
    $tipolicencia=$_POST['tipolicencia'];
    $academia=$_POST['academia'];
  

    $actualizar="UPDATE tripulacion SET Cargo='$cargo', Horas_Vuelo='$horasvuelo', Tipo_Licencia='$tipolicencia', Academia='$academia' WHERE Id_Tripulacion='$id'";

    $resultado=mysqli_query($conn,$actualizar);

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultatripulacion.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarTripulacion.php';
        </script>";
    }
?>