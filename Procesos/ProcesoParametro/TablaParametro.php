<?php

    class elementosMenu
    {
        public function mostarTablaParametro()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM parametro")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id del parámetro</th>
                            <th scope='col'>CAI</th>
                            <th scope='col'>Fecha de vencimiento</th>
                            <th scope='col'>Fecha de emisión</th>
                            <th scope='col'>Rango inicial</th>
                            <th scope='col'>Rango final</th>
                            <th scope='col'>Consecutivo</th>
                            
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

                        <form action='formEditParametros.php?id=$data[Id_Parametro]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Parametro]</th>
                            <td>$data[Cai]</td>
                            <td>$data[Fecha_Ven]</td>
                            <td>$data[Fecha_Emi]</td>
                            <td>$data[Rango_Ini]</td>
                            <td>$data[Rango_Fin]</td>
                            <td>$data[Consecutivo]</td>
                            

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR
                            <a class='btn btn-info' href='../Procesos/ProcesoParametro/actualizarParametro.php?id=$data[Id_Parametro]' >
                            <i class='fas fa-edit'></i>
                            </a>-->

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoParametro/eliminarParametro.php?id=$data[Id_Parametro]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Cai]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/parametropdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/parametroxlsx.php'>Generar XLSX
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>