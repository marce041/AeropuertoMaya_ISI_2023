<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaUsu()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM usuario")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Usuario</th>
                            <th scope='col'>Nombre Usuario</th>
                            <th scope='col'>Contraseña Encriptada</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>Acciones</th>
                            <th scope='col'>Hablitar/Deshabilitar</th>
                        </tr>
                    </thead>
                <tbody class='text-center'>
            ";

            while ($data = mysqli_fetch_assoc($query))
            {
                echo 
                "
                    <tr>

                        <form action='formEditUsuario.php?id=$data[idUser]' method='POST' name='form2'>
                            <th scope='row'>$data[idUser]</th>
                            <td>$data[Usuario]</td>
                            <td>$data[Pass]</td>
                            <td>$data[Estado]</td>

                            <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoUsuario/actualizarUsuario.php?id=$data[idUser]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoUsuario/eliminarUsuario.php?id=$data[idUser]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Usuario]\"); '><i class='fas fa-trash-alt'></i></a> </td>
                        
                            <td class='text-center'> <a class='btn btn-info' href='../Procesos/ProcesoUsuario/HabilitarUsuario.php?id=$data[idUser]' >
                            <i class='fas fa-save'></i></td> 
                            </form>
                        
                        </tr>
                    
                ";
            }
            echo
            "
                </tbody>
                </table>
                <table>
                <thead>
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/usuariopdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/usuarioxlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>