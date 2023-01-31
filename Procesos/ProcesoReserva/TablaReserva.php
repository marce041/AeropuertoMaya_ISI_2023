<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaReserva()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM reserva")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Reserva</th>
                            <th scope='col'>Codigo</th>
                            <th scope='col'>Id_Vuelo</th>
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

                        <form action='formEditCheckin.php?id=$data[Id_Reserva]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Reserva]</th>
                            <td>$data[Codigo]</td>
                            <td>$data[Id_Vuelo]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoReserva/actualizarReserva.php?id=$data[Id_Reserva]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoReserva/eliminarReserva.php?id=$data[Id_Reserva]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Codigo]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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