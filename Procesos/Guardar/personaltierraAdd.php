<?php
    include ("../../conexion.php");
    
    $cargaacademica=$_POST['cargaacademica'];
    $cargo=$_POST['cargo'];
  


    $insertar="INSERT INTO `personaltierra` (`Id_Personal`, `Carga_Academica`, `Cargo`) 
    VALUES (NULL, '$cargaacademica', '$cargo');";

    

    // echo "<script> alert('".$cargaacademica."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
        }catch(Exception $e) {
    
        $path = "logGuardarPersonalTierra.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        }   
    

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/personaltierra.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>