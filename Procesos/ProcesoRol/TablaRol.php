<?php

    class elementosMenu
    {
        public function mostarTablaRol()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM rol")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de rol</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Descripcion</th>
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

                        <form action='formEditRol.php?id=$data[Id_Rol]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Rol]</th>
                            <td>$data[Nombre]</td>
                            <td>$data[Descripcion]</td>
                            <td>$data[Activo]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoRol/actualizarRol.php?id=$data[Id_Rol]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoRol/eliminarRol.php?id=$data[Id_Rol]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Nombre]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/rolpdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/rolxlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>