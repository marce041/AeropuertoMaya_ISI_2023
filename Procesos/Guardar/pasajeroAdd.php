<?php
    include ("../../conexion.php");
    
    $nombre=$_POST['nombre'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $numerodoc=$_POST['numerodoc'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $fechaN=$_POST['fechaN'];


    $insertar="INSERT INTO `pasajero` (`Id_Pasajero`, `Nombre`, `Tipo_Documento`, `Numero_Documento`, `Telefono`, `Correo`, `Id_Pais`, `Fecha_Nacimiento`) 
    VALUES (NULL, '$nombre', '$estado', '$numerodoc', '$telefono', '$correo', '$estado2', '$fechaN');";

    

    // echo "<script> alert('".$nombre."'); </script>";
    try {
        $resultado=mysqli_query($conn, $insertar);
        }catch(Exception $e) {
    
        $path = "logGuardarPasajero.txt";
        error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
        }   
    

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/pasajero.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>