<?php
    include ("../../conexion.php");

    $cai=$_POST['cai'];
    $fecha_ven=$_POST['fecha_ven'];
    $fecha_emi=$_POST['fecha_emi'];
    $rango_ini=$_POST['rango_ini'];
    $rango_fin=$_POST['rangfin'];
    $consecutivo=$_POST['conse'];

    $sql2 = "SELECT Id_Parametro FROM parametro
    WHERE Cai = '$cai'";
    $resultado2 = $conn->query($sql2);
    $rows2 = $resultado2->num_rows;

if($rows2 > 0){
    echo  "<script>
    alert('Este CAI ya ha sido registrado');
    window.location = '../../DatosMaestros/parametros.php';
    </script>";  

}else{
    $insertar="INSERT INTO `parametro` (`Id_Parametro`, `Cai`, `Fecha_Ven`, `Fecha_Emi`, `Rango_Ini`, `Rango_Fin`, `Consecutivo`) 
    VALUES (NULL, '$cai', '$fecha_ven', '$fecha_emi', '$rango_ini', '$rango_fin', '$consecutivo');";

    $resultado=mysqli_query($conn, $insertar);
}
    // echo "<script> alert('".$nombre."'); </script>";

    if($resultado) {
        echo  "<script>
        alert('Se ha insertado correctamente los datos');
        window.location = '../../DatosMaestros/parametros.php';
        </script>";
    
    } else {
        echo  "<script>
        alert('NO SE PUDO insertar los datos');
        window.location = '../../principaladmin.php';
        </script>";
    }
?>