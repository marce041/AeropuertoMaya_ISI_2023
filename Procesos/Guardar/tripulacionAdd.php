<?php
    include ("../../conexion.php");
    
    $cargo=$_POST['cargo'];
    $horasvuelo=$_POST['horasvuelo'];
    $tipolicencia=$_POST['tipolicencia'];
    $academia=$_POST['academia'];
  


    $insertar="INSERT INTO `tripulacion` (`Id_Tripulacion`, `Cargo`, `Horas_Vuelo`, `Tipo_Licencia`, `Academia`) 
    VALUES (NULL, '$cargo', '$horasvuelo', '$tipolicencia', '$academia');";

  

    // echo "<script> alert('".$cargo."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
        }catch(Exception $e) {
    
        $path = "logGuardarTripulacion.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        }   

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/tripulacion.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>