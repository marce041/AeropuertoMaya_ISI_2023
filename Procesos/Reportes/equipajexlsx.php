<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Equipaje.xls');
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
    <th colspan=8>Reporte de Equipaje</th>
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
    <th colspan=2>Peso</th>
    <th colspan=2>Cantidad</th>
    <th colspan=2>Multiplicador</th>
    <th colspan=3></th>

</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from equipaje";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=2>$row[Id_Equipaje]</td>
    <td colspan=2>$row[Peso]</td>
    <td colspan=2>$row[Cantidad]</td>
    <td colspan=2>$row[MultiplicadorPrecio]</td>
    <td colspan=3></td>
    
    </tr>
    ";
}
?>  
</table>