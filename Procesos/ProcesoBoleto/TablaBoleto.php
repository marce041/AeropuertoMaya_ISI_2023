<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaBoleto()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM boleto")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Boleto</th>
                            <th scope='col'>Codigo</th>
                            <th scope='col'>Id_Asiento</th>
                            <th scope='col'>Id_Pasajero</th>
                            <th scope='col'>Id_Vuelo</th>
                            <th scope='col'>Id_Equipaje</th>
                            <th scope='col'>Id_Clase</th>
                            <th scope='col'>Precio</th>
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

                        <form action='formEditBoleto.php?id=$data[Id_Boleto]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Boleto]</th>
                            <td>$data[Codigo]</td>
                            <td>$data[Id_Asiento]</td>
                            <td>$data[Id_Pasajero]</td>
                            <td>$data[Id_Vuelo]</td>
                            <td>$data[Id_Equipaje]</td>
                            <td>$data[Id_Clase]</td>
                            <td>$data[Precio]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoBoleto/actualizarBoleto.php?id=$data[Id_Boleto]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoBoleto/eliminarBoleto.php?id=$data[Id_Boleto]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Codigo]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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