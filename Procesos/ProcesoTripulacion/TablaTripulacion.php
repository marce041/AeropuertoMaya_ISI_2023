<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaTripulacion()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM tripulacion")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Tripulacion</th>
                            <th scope='col'>Cargo</th>
                            <th scope='col'>Horas_Vuelo</th>
                            <th scope='col'>Tipo_Licencia</th>
                            <th scope='col'>Academia</th>
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

                        <form action='formEditTripulacion.php?id=$data[Id_Tripulacion]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Tripulacion]</th>
                            <td>$data[Cargo]</td>
                            <td>$data[Horas_Vuelo]</td>
                            <td>$data[Tipo_Licencia]</td>
                            <td>$data[Academia]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoTripulacion/actualizarTripulacion.php?id=$data[Id_Tripulacion]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoTripulacion/eliminarTripulacion.php?id=$data[Id_Tripulacion]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Cargo]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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