<?php

    class elementosMenu
    {
        public function mostarTablaPantallaAcciones()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM pantallaacciones")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de Pantalla Acciones</th>
                            <th scope='col'>Id Pantalla</th>
                            <th scope='col'>Id Acciones</th>
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

                        <form action='formEditPantallaAcciones.php?id=$data[Id_PantallaAccion]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_PantallaAccion]</th>
                            <td>$data[Id_Pantalla]</td>
                            <td>$data[Id_Acciones]</td>
                            <td>$data[Activo]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoPantallaAcciones/actualizarPantallaAcciones.php?id=$data[Id_PantallaAccion]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoPantallaAcciones/eliminarPantallaAcciones.php?id=$data[Id_PantallaAccion]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Id_Pantalla]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/pantallaaccionespdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/pantallaaccionesxlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>