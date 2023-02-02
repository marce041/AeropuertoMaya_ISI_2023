<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaPais()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM pais")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Pais</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Región</th>
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

                        <form action='formEditPais.php?id=$data[Id_Pais]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Pais]</th>
                            <td>$data[Nombre]</td>
                            <td>$data[Region]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoPais/actualizarPais.php?id=$data[Id_Pais]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoPais/eliminarPais.php?id=$data[Id_Pais]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Nombre]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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