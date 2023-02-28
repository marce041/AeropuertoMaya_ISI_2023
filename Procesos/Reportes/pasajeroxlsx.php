<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Pasajero.xls');
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
    <th colspan=12>Reporte de Pasajero</th>
<?php
echo "

    <th>Usuario: $rangoinicial</th>
    <th>Fecha: $fechaActual</th>
    <th>Hora: $horaActual</th>
  
    ";
    ?>
    </tr>
    <tr>
    <th colspan=3>Nombre</th>
    <th colspan=3>Tipo de Documento</th>
    <th colspan=3>N. Documento</th>
    <th colspan=3>Telefono</th>
    <th colspan=3></th>

</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from pasajero";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=3>$row[Nombre]</td>
    <td colspan=3>$row[Tipo_Documento]</td>
    <td colspan=3>$row[Numero_Documento]</td>
    <td colspan=3>$row[Telefono]</td>
    <td colspan=3></td>
    
    </tr>
    ";
}
?>  
</table>