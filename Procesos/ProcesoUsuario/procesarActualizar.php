<?php
    include ("../../conexion.php");

    $id=$_POST['id'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $estado=$_POST['estado'];
    $password_encriptada = sha1($pass);

    $actualizar="UPDATE usuario SET Usuario='$user', Pass='$password_encriptada', Estado='$estado' WHERE idUser='$id'";

    $resultado=mysqli_query($conn,$actualizar);

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