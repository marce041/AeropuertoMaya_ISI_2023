<?php
function redondear_dos_decimal($valor) {
	$float_redondeado=round($valor * 100) / 100;
	return $float_redondeado;
	}
    
    include ("../../conexion.php");

    $codigo=$_POST['codigo'];
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_STRING);
    $estado3 = filter_input(INPUT_POST, 'estado3', FILTER_SANITIZE_STRING);
    $estado4 = filter_input(INPUT_POST, 'estado4', FILTER_SANITIZE_STRING);
    $estado5 = filter_input(INPUT_POST, 'estado5', FILTER_SANITIZE_STRING);

    $query4=mysqli_query($conn, "SELECT `vuelo`.`Precio` FROM `vuelo` WHERE `Id_Vuelo`=$estado3;");
    $date = array();
  
    while($datos = mysqli_fetch_array($query4)) {
        array_push($date, $datos['Precio']);
    }

$pruebafecha=$date[0];

    $query5=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM equipaje WHERE Id_Equipaje=$estado4");
    $equi = array();
  
    while($datos = mysqli_fetch_array($query5)) {
        array_push($equi, $datos['MultiplicadorPrecio']);
    }

$pruebaequi=$equi[0];

    $query6=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM clase WHERE Id_Clase=$estado5");
 
    $cla = array();
  
    while($datos = mysqli_fetch_array($query6)) {
        array_push($cla, $datos['MultiplicadorPrecio']);
    }

$pruebacla=$cla[0];  


$costo_vuelo=$pruebafecha;
    $costo_clase=redondear_dos_decimal($costo_vuelo*$pruebacla);
    $costo_equipaje=redondear_dos_decimal($costo_vuelo*$pruebaequi);


$monto=$costo_vuelo + $costo_clase + $costo_equipaje;

    $actualizar="UPDATE listaasientos SET Estado='0' WHERE Id_Lista='$estado'";
    $insertar="INSERT INTO `boleto` (`Id_Boleto`, `Codigo`, `Id_Asiento`, `Id_Pasajero`, `Id_Vuelo`, `Id_Equipaje`,`Id_Clase`,`Precio`,`Estado`) 
    VALUES (NULL, '$codigo', '$estado', '$estado2','$estado3','$estado4','$estado5','$monto','1');";
    $resultado=mysqli_query($conn, $insertar);
    $res2=mysqli_query($conn, $actualizar);

    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/boleto.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>