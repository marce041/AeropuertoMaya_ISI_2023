<?php
include("../../conexion.php");

    $id=$_GET['id'];

    $query4=mysqli_query($conn, "SELECT `Id_Asiento` FROM `boleto` WHERE `Id_boleto`=$id;");
    $date = array();
  
    while($datos = mysqli_fetch_array($query4)) {
        array_push($date, $datos['Id_Asiento']);
    }

$pruebafecha=$date[0];

    
    $actualizar3="UPDATE listaasientos SET Estado='1' WHERE Id_Lista='$pruebafecha'";
    $eliminar="DELETE FROM boleto WHERE Id_Boleto='$id'";
    

    

    try {
        $resultado=mysqli_query($conn,$eliminar);
     }catch(Exception $e) {
    
        $path = "logEliminarBoleto.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
     }   

    if($resultado)
    {
        echo  "<script>
        alert('ELIMINAR EXITOSO');
        window.location = '../../Consultas/Consultaboletos.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('ERROR');
        window.location = '../../Consultas/Consultaboletos.php';
        </script>";
    
    }

?>