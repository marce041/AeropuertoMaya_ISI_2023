<?php


    class elementosMenu
    {
        public function mostarTabla()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM detallefactura")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de detalle</th>
                            <th scope='col'>Id del boleto</th>
                            <th scope='col'>Cantidad</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Subtotal</th>
                            <th scope='col'>Descuentos</th>
                            <th scope='col'>Impuestos</th>
                            <th scope='col'>Total</th>
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

                        <form action='formEdit.php?id=$data[Id_Detalle]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_Detalle]</th>
                            <td>$data[Id_Boleto]</td>
                            <td>$data[Cantidad]</td>
                            <td>$data[Descripcion]</td>
                            <td>$data[Subtotal]</td>
                            <td>$data[Total_Descuento]</td>
                            <td>$data[Total_Impuesto]</td>
                            <td>$data[Total]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR
                            <a class='btn btn-info' href='../Procesos/ProcesoDetalle/actualizar.php?id=$data[Id_Detalle]' >
                            <i class='fas fa-edit'></i>
                            </a>-->

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoDetalle/eliminar.php?id=$data[Id_Detalle]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Descripcion]\"); '><i class='fas fa-trash-alt'></i></a> </td>
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/detallepdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/detallexlsx.php'>Generar XLSX
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>