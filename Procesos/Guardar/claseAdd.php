<?php
    include ("../../conexion.php");

   
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $descripcion=$_POST['descripcion'];
    $multiplicadorprecio=$_POST['multiplicadorprecio'];

    $sql2 = "SELECT Id_Clase FROM clase
    WHERE Tipo_Clase = '$estado2'";
    $resultado2 = $conn->query($sql2);
    $rows2 = $resultado2->num_rows;

if($rows2 > 0){

    echo  "<script>
    alert('Esta clase ya ha sido registrada.');
    window.location = '../../DatosMaestros/clase.php';
    </script>"; 
}else{



    $insertar="INSERT INTO `clase` (`Id_Clase`, `Tipo_Clase`, `Descripcion`, `MultiplicadorPrecio`) 
    VALUES (NULL, '$estado2','$descripcion', '$multiplicadorprecio');";

    date_default_timezone_set('America/Mexico_City');

    try {
    $resultado=mysqli_query($conn, $insertar);
    }catch(Exception $e) {

    $path = "temp/logGuardarClase.txt";
    error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
    }

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/clase.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../DatosMaestros/clase.php';
        </script>";
    }
}
?>