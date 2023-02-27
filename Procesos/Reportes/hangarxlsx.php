<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Hangar.xls');
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
    <th colspan=10>Reporte de Hangar</th>
<?php
echo "

    <th>Usuario: $rangoinicial</th>
    <th>Fecha: $fechaActual</th>
    <th>Hora: $horaActual</th>
  
    ";
    ?>
    </tr>
    <tr>
    <th colspan=2>Id</th>
    <th colspan=2>Codigo</th>
    <th colspan=2>Capacidad</th>
    <th colspan=2>Id Aeronave</th>
    <th colspan=2>Id Aeropuerto</th>
    <th colspan=3></th>

</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from hangar";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=2>$row[Id_hangar]</td>
    <td colspan=2>$row[Codigo]</td>
    <td colspan=2>$row[Capacidad]</td>
    <td colspan=2>$row[Id_Aeronave]</td>
    <td colspan=2>$row[Id_Aeropuerto]</td>
    <td colspan=3></td>
    
    </tr>
    ";
}
?>  
</table>