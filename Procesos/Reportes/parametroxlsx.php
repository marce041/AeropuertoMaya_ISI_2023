<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Parametros.xls');
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
    <th colspan=12>Reporte de Parametro</th>
<?php
echo "

    <th>Usuario: $rangoinicial</th>
    <th>Fecha: $fechaActual</th>
    <th>Hora: $horaActual</th>
  
    ";
    ?>
    </tr>
    <tr>
    <th colspan=3>CAI</th>
    <th colspan=3>Rango Inicial</th>
    <th colspan=3>Rango Final</th>
    <th colspan=3>Fecha Vencimiento</th>
    <th colspan=3></th>
</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from parametro";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=3>$row[Cai]</td>
    <td colspan=3>$row[Rango_Ini]</td>
    <td colspan=3>$row[Rango_Fin]</td>
    <td colspan=3>$row[Fecha_Ven]</td>
    <td colspan=3></td>
    </tr>
    ";
}
?>  
</table>