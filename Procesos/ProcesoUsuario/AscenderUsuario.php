<?php
    include ("../../conexion.php");

    $id=$_GET['id'];

    $sql2 = "SELECT Id_Rol FROM usuario
    WHERE idUser = '$id' AND Id_Rol = 'user'";
    $resultado2 = $conn->query($sql2);
    $rows2 = $resultado2->num_rows;
	if($rows2 > 0){
      
        $actualizar="UPDATE usuario SET Id_Rol='1' WHERE idUser='$id'";

        try {
            $resultado=mysqli_query($conn,$actualizar);
          }catch(Exception $e) {
            $datos = date('H:i:s');
            $hora=explode(":", $datos);
            $datos2 = date('d/m/Y');
         
            $fecha=explode("/", $datos2);
            
             $path = "HabilitarUsuario-".$fecha[2]."-".$fecha[1]."-".$fecha[0]."_HH".$hora[0]."_mm".$hora[1]."_ss".$hora[2].".log";
             error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(),3,$path);
         }
    
        if($resultado)
        {
            echo  "<script>
            alert('Se ha ascendido este usuario');
            window.location = '../../Seguridad/Consultausuarios.php';
            </script>";
        }
        else
        {
            echo  "<script>
            alert('No se ha podido ascender este usuario');
            window.location = 'actualizarUsuario.php';
            </script>";
        }  


    }else{

        $actualizar="UPDATE usuario SET Id_Rol='2' WHERE idUser='$id'";

        $resultado=mysqli_query($conn,$actualizar);
    
        if($resultado)
        {
            echo  "<script>
            alert('Se ha descendido este usuario');
            window.location = '../../Seguridad/Consultausuarios.php';
            </script>";
        }
        else
        {
            echo  "<script>
            alert('Se ha deshabilitado este usuario');
            window.location = 'actualizarUsuario.php';
            </script>";
        }


        $actualizar="UPDATE usuario SET Id_Rol='3' WHERE idUser='$id'";

        $resultado=mysqli_query($conn,$actualizar);

        if($resultado)
        {
            echo  "<script>
            alert('Se ha descendido este usuario');
            window.location = '../../Seguridad/Consultausuarios.php';
            </script>";
        }
        else
        {
            echo  "<script>
            alert('Se ha deshabilitado este usuario');
            window.location = 'actualizarUsuario.php';
            </script>";
        }

    }

    
?>