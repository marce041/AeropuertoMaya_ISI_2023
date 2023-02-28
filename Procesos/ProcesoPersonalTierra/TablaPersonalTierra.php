<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaPersonalTierra()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM personaltierra")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id del personal</th>
                            <th scope='col'>Carga académica</th>
                            <th scope='col'>Cargo</th>
                            
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

                        <form action='formEditPersonalTierra.php?id=$data[Id_Personal]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Personal]</th>
                            <td>$data[Carga_Academica]</td>
                            <td>$data[Cargo]</td>
                            

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoPersonalTierra/actualizarPersonalTierra.php?id=$data[Id_Personal]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoPersonalTierra/eliminarPersonalTierra.php?id=$data[Id_Personal]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Carga_Academica]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/personalpdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/personalxlsx.php'>Generar XLS
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>