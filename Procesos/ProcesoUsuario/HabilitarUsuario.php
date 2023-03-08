<?php
    include ("../../conexion.php");

    $id=$_GET['id'];

    $sql2 = "SELECT Estado FROM usuario
    WHERE idUser = '$id' AND Estado = '0'";
    $resultado2 = $conn->query($sql2);
    $rows2 = $resultado2->num_rows;
	if($rows2 > 0){
      
        $actualizar="UPDATE usuario SET Estado='1' WHERE idUser='$id'";

        try {
            $resultado=mysqli_query($conn,$actualizar);
         }catch(Exception $e) {
        
            $path = "logHabilitarUsuario.txt";
            error_log("\n" .date("d/m/Y H:i:s")." ". $e->getMessage(), 3, $path);
         }   
    
        if($resultado)
        {
            echo  "<script>
            alert('Se ha habilitado este usuario');
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


    }else{

        $actualizar="UPDATE usuario SET Estado='0' WHERE idUser='$id'";

        $resultado=mysqli_query($conn,$actualizar);
    
        if($resultado)
        {
            echo  "<script>
            alert('Se ha habilitado este usuario');
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