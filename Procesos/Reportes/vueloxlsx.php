<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Vuelo.xls');
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
    <th colspan=15>Reporte de vuelos</th>
<?php
echo "

    <th>Usuario: $rangoinicial</th>
    <th>Fecha: $fechaActual</th>
    <th>Hora: $horaActual</th>
  
    ";
    ?>
    </tr>
    <tr>
    <th colspan=3>Vuelo</th>
    <th colspan=3>Codigo</th>
    <th colspan=3>Salida</th>
    <th colspan=3>Llegada</th>
    <th colspan=3>Hr salida</th>
    <th colspan=3>Hr llegada</th>
    <th colspan=3>Fecha</th>
    <th colspan=3>Precio</th>
    <th colspan=3>Aeronave</th>
    <th colspan=3></th>

</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from vuelo";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=3>$row[Id_Vuelo]</td>
    <td colspan=3>$row[Codigo]</td>
    <td colspan=3>$row[Lugar_Salida]</td>
    <td colspan=3>$row[Lugar_LLegada]</td>
    <td colspan=3>$row[Hora_Salida]</td>
    <td colspan=3>$row[Hora_LLegada]</td>
    <td colspan=3>$row[Fecha]</td>
    <td colspan=3>$row[Precio]</td>
    <td colspan=3>$row[Id_Aeronave]</td>
    <td colspan=3></td>
    
    </tr>
    ";
}
?>  
</table>