<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Aeronave.xls');
?>

<table border="1">
<tr>
    <th colspan=4>Reporte de Aeronaves</th>
    </tr>
    <tr>
    <th>Matricula</th>
    <th>Modelo</th>
    <th>Capacidad</th>
    <th>Tipo</th>

</tr>
<?php require "../../conexion.php";
$consulta="SELECT * from aeronave";
$resultado=$conn->query($consulta);

while($row=$resultado->fetch_assoc()){
   echo "<tr>
    <td>$row[Matricula]</td>
    <td>$row[Modelo]</td>
    <td>$row[Capacidad]</td>
    <td>$row[Tipo]</td>
    
    </tr>
    ";
}
?>  
</table>