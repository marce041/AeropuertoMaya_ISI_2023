<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Personal.xls');
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
    <th colspan=9>Reporte de Personal</th>
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
    <th colspan=3>Carga Academica</th>
    <th colspan=3>Cargo</th>
    <th colspan=3></th>
</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from personaltierra";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=3>$row[Id_Personal]</td>
    <td colspan=3>$row[Carga_Academica]</td>
    <td colspan=3>$row[Cargo]</td>
    <td colspan=3></td>
    </tr>
    ";
}
?>  
</table>