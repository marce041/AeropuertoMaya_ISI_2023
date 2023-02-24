<?php

    class elementosMenu
    {
        public function mostarTablaNave()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM aeronave")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de la aeronave</th>
                            <th scope='col'>Matricula</th>
                            <th scope='col'>Modelo</th>
                            <th scope='col'>Capacidad</th>
                            <th scope='col'>Tamaño</th>
                            <th scope='col'>Tipo</th>
                            <th scope='col'>Area</th>
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

                        <form action='formEditNave.php?id=$data[Id_Aeronave]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Aeronave]</th>
                            <td>$data[Matricula]</td>
                            <td>$data[Modelo]</td>
                            <td>$data[Capacidad]</td>
                            <td>$data[Tamaño]</td>
                            <td>$data[Tipo]</td>
                            <td>$data[Area]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoAeronave/actualizarNave.php?id=$data[Id_Aeronave]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoAeronave/eliminarNave.php?id=$data[Id_Aeronave]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Matricula]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/aeronavepdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/aeronavexlsx.php'>Generar XLS
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>