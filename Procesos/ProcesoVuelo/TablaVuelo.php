<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaVuelo()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM vuelo")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de vuelo</th>
                            <th scope='col'>Código</th>
                            <th scope='col'>Lugar de salida</th>
                            <th scope='col'>Lugar de llegada</th>
                            <th scope='col'>Hora de salida</th>
                            <th scope='col'>Hora de llegada</th>
                            <th scope='col'>Fecha</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Id de aeronave</th>
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

                        <form action='formEditVuelo.php?id=$data[Id_Vuelo]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Vuelo]</th>
                            <td>$data[Codigo]</td>
                            <td>$data[Lugar_Salida]</td>
                            <td>$data[Lugar_LLegada]</td>
                            <td>$data[Hora_Salida]</td>
                            <td>$data[Hora_LLegada]</td>
                            <td>$data[Fecha]</td>
                            <td>$data[Precio]</td>
                            <td>$data[Id_Aeronave]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoVuelo/actualizarVuelo.php?id=$data[Id_Vuelo]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoVuelo/eliminarVuelo.php?id=$data[Id_Vuelo]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Codigo]\"); '><i class='fas fa-trash-alt'></i></a> </td>
                        </form>
                    </tr>

                ";
            }
            echo
            "
                </tbody>
                </table>

            ";
        }
    }

?>