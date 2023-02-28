<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Checkin.xls');
require "../../conexion.php";
session_start();



$user=$_SESSION['idUser'];
$queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
    
    $rangini = array();
  
    while($datos = mysqli_fetch_array($queryparametro)) {
        array_push($rangini, $datos['Usuario']);
    }

    $rangoinicial=$rangini[0];

    date_default_timezone_set('America/Mexico_City');

    $fechaActual = date("d-m-Y");
    $horaActual = date("H:i:s");
?>

<table border="1">
<tr>
    <th colspan=12>Reporte de CheckIn</th>
<?php
echo "

    <th>Usuario: $rangoinicial</th>
    <th>Fecha: $fechaActual</th>
    <th>Hora: $horaActual</th>
  
    ";
    ?>
    </tr>
    <tr>
    <th colspan=3>Codigo</th>
    <th colspan=3>Reserva</th>
    <th colspan=3>Pasajero</th>
    <th colspan=3>Fecha y Hora</th>
    <th colspan=3></th>
</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from checkin";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=3>$row[Id_Checkin]</td>
    <td colspan=3>$row[Id_Reserva]</td>
    <td colspan=3>$row[Pasajero]</td>
    <td colspan=3>$row[Fecha_Hora]</td>
    <td colspan=3></td>
    </tr>
    ";
}
?>  
</table>