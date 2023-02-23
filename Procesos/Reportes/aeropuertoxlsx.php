<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Aeropuerto.xls');
?>

<table border="1">
<tr>
    <th colspan=3>Reporte de Aeropuertos</th>
    </tr>
    <tr>
    <th>Nombre</th>
    <th>Hangar</th>
    <th>Id_Ciudad</th>
</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from aeropuerto";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td>$row[Nombre]</td>
    <td>$row[Hangar]</td>
    <td>$row[Id_Ciudad]</td>
    
    </tr>
    ";
}
?>  
</table>