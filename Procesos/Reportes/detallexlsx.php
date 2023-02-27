<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Detalle.xls');
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
    <th colspan=18>Reporte del Detalle de Factura</th>
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
    <th colspan=2>Id Boleto</th>
    <th colspan=2>Cantidad</th>
    <th colspan=2>Descripcion</th>
    <th colspan=2>SubTotal</th>
    <th colspan=2>Descuento</th>
    <th colspan=2>Impuesto</th>
    <th colspan=2>Total</th>
    <th colspan=2>Estado</th>
    <th colspan=3></th>

</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from detallefactura";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=2>$row[Id_Detalle]</td>
    <td colspan=2>$row[Id_Boleto]</td>
    <td colspan=2>$row[Cantidad]</td>
    <td colspan=2>$row[Descripcion]</td>
    <td colspan=2>$row[Subtotal]</td>
    <td colspan=2>$row[Total_Descuento]</td>
    <td colspan=2>$row[Total_Impuesto]</td>
    <td colspan=2>$row[Total]</td>
    <td colspan=2>$row[Estado]</td>
    <td colspan=3></td>
    
    </tr>
    ";
}
?>  
</table>