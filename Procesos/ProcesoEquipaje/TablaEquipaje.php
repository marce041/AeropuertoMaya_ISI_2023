<?php

    session_start();

    class elementosMenu
    {
        public function mostarTablaEquipaje()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM equipaje")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id del equipaje</th>
                            <th scope='col'>Peso</th>
                            <th scope='col'>Cantidad</th>
                            <th scope='col'>Multiplicador de precio</th>
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

                        <form action='formEditEquipaje.php?id=$data[Id_Equipaje]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Equipaje]</th>
                            <td>$data[Peso]</td>
                            <td>$data[Cantidad]</td>
                            <td>$data[MultiplicadorPrecio]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoEquipaje/actualizarEquipaje.php?id=$data[Id_Equipaje]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoEquipaje/eliminarEquipaje.php?id=$data[Id_Equipaje]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Peso]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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