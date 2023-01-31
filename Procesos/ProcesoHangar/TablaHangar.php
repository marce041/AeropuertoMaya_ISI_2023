<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaHangar()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM hangar")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Hangar</th>
                            <th scope='col'>Codigo</th>
                            <th scope='col'>Capacidad</th>
                            <th scope='col'>Id_Aeronave</th>
                            <th scope='col'>Id_Aeropuerto</th>
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

                        <form action='formEditHangar.php?id=$data[Id_Hangar]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Hangar]</th>
                            <td>$data[Codigo]</td>
                            <td>$data[Capacidad]</td>
                            <td>$data[Id_Aeronave]</td>
                            <td>$data[Id_Aeropuerto]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoHangar/actualizarHangar.php?id=$data[Id_Hangar]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoHangar/eliminarHangar.php?id=$data[Id_Hangar]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Codigo]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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