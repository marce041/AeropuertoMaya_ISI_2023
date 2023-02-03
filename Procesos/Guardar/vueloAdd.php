<?php
    include ("../../conexion.php");
    
    $codigo=$_POST['codigo'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $estado3 = filter_input(INPUT_POST, 'estado3', FILTER_SANITIZE_STRING);
    $horasal=$_POST['horasal'];
    $horall=$_POST['horall'];
    $fecha=$_POST['fecha'];
    $precio=$_POST['precio'];
  


    $insertar="INSERT INTO `vuelo` (`Id_Vuelo`, `Codigo`, `Lugar_Salida`, `Lugar_LLegada`, `Hora_Salida`, `Hora_LLegada`, `Fecha`, `Precio`, Id_Aeronave) 
    VALUES (NULL, '$codigo', '$estado', '$estado2', '$horasal', '$horall', '$fecha', '$precio', $estado3);";

    $verificar_fecha = mysqli_query($conn, "SELECT * FROM vuelo WHERE fecha='$fecha'");
    $verificar_horasal = mysqli_query($conn, "SELECT * FROM vuelo WHERE hora_salida='$horasal'");
    $verificar_horall = mysqli_query($conn, "SELECT * FROM vuelo WHERE hora_llegada='$horall'");
    

    if(mysqli_num_rows($verificar_fecha) > 0){
        echo "
        <script>
        alert('Esta fecha ya esta registrada, intenta con una diferente');
        window.location = '../../DatosMaestros/vuelo.php';
        </script>
        ";
        exit();
    }
    if(mysqli_num_rows($verificar_horasal) > 0){
        echo "
        <script>
        alert('Esta hora de salida ya esta registrada, intenta con una diferente');
        window.location = '../../DatosMaestros/vuelo.php';
        </script>
        ";
        exit();
    }
    if(mysqli_num_rows($verificar_horall) > 0){
        echo "
        <script>
        alert('Esta hora de llegada ya esta registrada, intenta con una diferente');
        window.location = '../../DatosMaestros/vuelo.php';
        </script>
        ";
        exit();
    }
    
    
    

    $resultado=mysqli_query($conn, $insertar);

    // echo "<script> alert('".$codigo."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/vuelo.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>