<?php
    include ("../../conexion.php");
    date_default_timezone_set('America/Mexico_City');

    $id=$_POST['id'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $estado=$_POST['estado'];
    $estado2=$_POST['estado2'];
    $password_encriptada = sha1($pass);

    $actualizar="UPDATE usuario SET Usuario='$user', Pass='$password_encriptada' Id_Rol='$estado2', Estado='$estado' WHERE idUser='$id'";

    
    try {
        $resultado=mysqli_query($conn,$actualizar);
      }catch(Exception $e) {
        $datos = date('H:i:s');
        $hora=explode(":", $datos);
        $datos2 = date('d/m/Y');
     
        $fecha=explode("/", $datos2);
        
         $path = "ActualizarUsuario-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
         error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
     }

    if($resultado)
    {
        echo  "<script>
        alert('Se ha actualizado datos');
        window.location = '../../Seguridad/Consultausuarios.php';
        </script>";
    }
    else
    {
        echo  "<script>
        alert('NO SE PUDO actualizar datos');
        window.location = 'actualizarUsuario.php';
        </script>";
    }
?>