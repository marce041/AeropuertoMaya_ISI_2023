<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');
    
    $nombre=$_POST['nombre'];
    $codigo=$_POST['codigo'];
    $terminal=$_POST['terminal'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);



    $insertar="INSERT INTO `ciudad` (`Id_Ciudad`, `Nombre`, `Codigo`, `Terminal`, `Id_Pais`) 
    VALUES (NULL, '$nombre', '$codigo', '$terminal', '$estado');";

    

    // echo "<script> alert('".$nombre."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {
      $datos = date('H:i:s');
      $hora=explode(":", $datos);
      $datos2 = date('d/m/Y');
   
      $fecha=explode("/", $datos2);
      
       $path = "GuardarCiudad-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_".$hora[0]."_".$hora[1]."_".$hora[2].".log";
       error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
       header("Location: ../../Consultas/Consultaciudades.php");
   }

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/ciudad.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../DatosMaestros/ciudad.php';
        </script>";
    }
?>