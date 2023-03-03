<?php


    class elementosMenu
    {
        public function mostarTablaPasajero()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM pasajero")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id del pasajero</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Tipo de documento</th>
                            <th scope='col'>Número documento</th>
                            <th scope='col'>Teléfono</th>
                            <th scope='col'>Correo</th>
                            <th scope='col'>Id del país</th>
                            <th scope='col'>Fecha de nacimiento</th>
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

                        <form action='formEditCiudad.php?id=$data[Id_Pasajero]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Pasajero]</th>
                            <td>$data[Nombre]</td>
                            <td>$data[Tipo_Documento]</td>
                            <td>$data[Numero_Documento]</td>
                            <td>$data[Telefono]</td>
                            <td>$data[Correo]</td>
                            <td>$data[Id_Pais]</td>
                            <td>$data[Fecha_Nacimiento]</td>

                            <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoPasajero/actualizarPasajero.php?id=$data[Id_Pasajero]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoPasajero/eliminarPasajero.php?id=$data[Id_Pasajero]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Nombre]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/pasajeropdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/pasajeroxlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>