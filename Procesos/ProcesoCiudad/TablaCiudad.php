<?php
 session_start();

    class elementosMenu
    {
        public function mostarTablaCiudad()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM ciudad")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de ciudad</th>
                            <th scope='col'>Nombre de la ciudad</th>
                            <th scope='col'>Código postal</th>
                            <th scope='col'>Terminal</th>
                            <th scope='col'>Id de país</th>
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

                        <form action='formEditCiudad.php?id=$data[Id_Ciudad]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Ciudad]</th>
                            <td>$data[Nombre]</td>
                            <td>$data[Codigo]</td>
                            <td>$data[Terminal]</td>
                            <td>$data[Id_Pais]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoCiudad/actualizarCiudad.php?id=$data[Id_Ciudad]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoCiudad/eliminarCiudad.php?id=$data[Id_Ciudad]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Nombre]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/ciudadpdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/ciudadxlsx.php'>Generar XLS
                            </a></th>
                            </thead>
                            </table>

            

            ";
        }
    }

?>