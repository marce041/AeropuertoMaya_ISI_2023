<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaAero()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM aeropuerto")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id del aeropuerto</th>
                            <th scope='col'>Nombre del aeropuerto</th>
                            <th scope='col'>Hangar</th>
                            <th scope='col'>Id de la ciudad</th>
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

                        <form action='formEditAero.php?id=$data[Id_Aeropuerto]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Aeropuerto]</th>
                            <td>$data[Nombre]</td>
                            <td>$data[Hangar]</td>
                            <td>$data[Id_Ciudad]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoAeropuerto/actualizarAero.php?id=$data[Id_Aeropuerto]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoAeropuerto/eliminarAero.php?id=$data[Id_Aeropuerto]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Nombre]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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