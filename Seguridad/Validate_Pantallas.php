<?php
$pantallas_permitidas = ['Equipaje', 'Pais'];

if(!array_key_exists('nombre', $_SESSION) || !in_array($_SESSION['nombre'], $pantallas_permitidas)){
    echo  "<script>
    alert('El usuario no tiene permisos para acceder a esta pantalla.');
    window.location = '../principaladmin.php';
    </script>";
}
?>