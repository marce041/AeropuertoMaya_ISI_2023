<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaMoneda()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM moneda")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de la moneda</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Conversión a dólares</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                <tbody class='text-center'>
            ";

            while ($data = mysqli_fetch_assoc($query))
            {
                if($data['Id_Moneda']==1){

                echo 
                "
                    <tr>

                        <form action='formEditMoneda.php?id=$data[Id_Moneda]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Moneda]</th>
                            <td>$data[Nombre]</td>
                            <td>$data[ConversionADolar]</td>
                            <td class='text-center'> </td>
                        </form>
                    </tr>

                ";
            }else{
                echo 
                "
                    <tr>

                        <form action='formEditMoneda.php?id=$data[Id_Moneda]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Moneda]</th>
                            <td>$data[Nombre]</td>
                            <td>$data[ConversionADolar]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoMoneda/actualizarMoneda.php?id=$data[Id_Moneda]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoMoneda/eliminarMoneda.php?id=$data[Id_Moneda]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Nombre]\"); '><i class='fas fa-trash-alt'></i></a> </td>
                        </form>
                    </tr>

                ";  
            }
        }
            echo
            "
                </tbody>
                </table>

            ";
        }
    }

?>