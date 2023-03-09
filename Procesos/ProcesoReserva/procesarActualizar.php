<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $estado=$_POST['estado'];

  

    $actualizar="UPDATE reserva SET Codigo='$codigo', Id_Vuelo='$estado' WHERE Id_Reserva='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $path = "temp/logActualizarReserva.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   
 

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultareserva.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultareserva.php';
        </script>";
    }
?>