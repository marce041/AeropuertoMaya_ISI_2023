<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaPaseAbordar()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM paseabordar")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
            <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/pasepdf.php'>Generar PDF
            </a></th>
                        <th scope='col'>
                        <a class='btn btn-info' href='../Procesos/Reportes/pasexlsx.php'>Generar Excel
                         </a></th>
                        </thead>
                        </table>
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id del pase</th>
                            <th scope='col'>Código</th>
                            <th scope='col'>Fecha</th>
                            <th scope='col'>Puerta de embarque</th>
                            <th scope='col'>Id del boleto</th>
                            <th scope='col'>Id del pasajero</th>
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

                        <form action='formEditPaseAbordar.php?id=$data[Id_Pase]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Pase]</th>
                            <td>$data[Codigo]</td>
                            <td>$data[Fecha]</td>
                            <td>$data[Puerta_Embarque]</td>
                            <td>$data[Id_Boleto]</td>
                            <td>$data[Id_Pasajero]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoPaseAbordar/actualizarPaseAbordar.php?id=$data[Id_Pase]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoPaseAbordar/eliminarPaseAbordar.php?id=$data[Id_Pase]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Codigo]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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