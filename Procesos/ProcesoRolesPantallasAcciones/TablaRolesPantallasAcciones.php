<?php

    class elementosMenu
    {
        public function mostarTablaRolesPantallasAcciones()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM rolespantallasacciones")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de Roles Pantallas Acciones</th>
                            <th scope='col'>Id Roles</th>
                            <th scope='col'>Id Pantalla</th>
                            <th scope='col'>Activo</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                <tbody class='text-center'>
            ";

            while ($data = mysqli_fetch_assoc($query))
            {
                echo 
                "
                    <tr>

                        <form action='formEditRolesPantallasAcciones.php?id=$data[Id_RolesPA]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_RolesPA]</th>
                            <td>$data[Id_Rol]</td>
                            <td>$data[Id_Pantalla]</td>
                            <td>$data[Activo]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoRolesPantallasAcciones/actualizarRolesPantallasAcciones.php?id=$data[Id_RolesPA]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoRolesPantallasAcciones/eliminarRolesPantallasAcciones.php?id=$data[Id_RolesPA]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Id_Rol]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/rolespantallasaccionespdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/rolespantallasaccionesxlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>