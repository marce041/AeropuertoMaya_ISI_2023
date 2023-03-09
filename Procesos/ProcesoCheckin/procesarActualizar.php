<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];

  

    $actualizar="UPDATE checkin SET Id_Reserva='$estado', Pasajero='$estado2' WHERE Id_Checkin='$id'";

    

    try {
        $resultado=mysqli_query($conn,$actualizar);
     }catch(Exception $e) {
    
        $path = "temp/logActualizarCheckin.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   
 

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Consultas/Consultacheckin.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = '../../Consultas/Consultacheckin.php';
        </script>";
    }
?>