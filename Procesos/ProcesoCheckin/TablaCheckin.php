<?php


    class elementosMenu
    {
        public function mostarTablaCheckin()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM checkin")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de check-in</th>
                            <th scope='col'>Id de la reserva</th>
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

                        <form action='formEditCheckin.php?id=$data[Id_Checkin]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Checkin]</th>
                            <td>$data[Id_Reserva]</td>
                            <td>$data[Pasajero]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoCheckin/actualizarCheckin.php?id=$data[Id_Checkin]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoCheckin/eliminarCheckin.php?id=$data[Id_Checkin]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Id_Reserva]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/checkinpdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/checkinxlsx.php'>Generar XLS
                            </a></th>
                            </thead>
                            </table>
            ";
        }
    }

?>