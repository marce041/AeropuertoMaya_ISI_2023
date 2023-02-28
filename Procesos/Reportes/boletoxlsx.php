<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Boleto.xls');
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
    <th colspan=12>Reporte de Boleto</th>
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
    <th colspan=3>Asiento</th>
    <th colspan=3>Pasajero</th>
    <th colspan=3>Precio</th>
    <th colspan=3></th>
</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from boleto";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td colspan=3>$row[Codigo]</td>
    <td colspan=3>$row[Id_Asiento]</td>

    ";
    $pasajero=$row['Id_Pasajero'];
    $querypasajero=mysqli_query($conn, "SELECT Nombre FROM pasajero WHERE `Id_Pasajero`=$pasajero;");
        
        $rang = array();
      
        while($datos = mysqli_fetch_array($querypasajero)) {
            array_push($rang, $datos['Nombre']);
        }
    
        $rangpaso=$rang[0];
        
    echo "
    <td colspan=3>$rangpaso</td>
    <td colspan=3>$row[Precio]</td>
    <td colspan=3></td>
    </tr>
    ";
}
?>  
</table>