<?php


    class elementosMenu
    {
        public function mostarTablaClase()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM clase")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de clase</th>
                            <th scope='col'>Tipo de clase</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Multiplicador de precio</th>
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

                        <form action='formEditClase.php?id=$data[Id_Clase]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Clase]</th>
                            <td>$data[Tipo_Clase]</td>
                            <td>$data[Descripcion]</td>
                            <td>$data[MultiplicadorPrecio]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoClase/actualizarClase.php?id=$data[Id_Clase]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoClase/eliminarClase.php?id=$data[Id_Clase]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Tipo_Clase]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/clasepdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/clasexlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>