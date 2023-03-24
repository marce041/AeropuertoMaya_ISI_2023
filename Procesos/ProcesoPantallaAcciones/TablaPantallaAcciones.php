<?php

    class elementosMenu
    {
        public function mostarTablaPantallaAcciones()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM pantallaacciones")
            or die ('error: '.mysqli_error($conn));

            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id de Pantalla Acciones</th>
                            <th scope='col'>Id Pantalla</th>
                            <th scope='col'>Id Acciones</th>
                            <th scope='col'>Activo</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                <tbody class='text-center'>
            ";

            $user=$_SESSION['idUser'];

            $queryllamar_id_rol=mysqli_query($conn, "SELECT Id_Rol FROM usuario WHERE `idUser`=$user;");
         
            $id_rol = array();
           
             while($datos = mysqli_fetch_array($queryllamar_id_rol)) {
                 array_push($id_rol, $datos['Id_Rol']);
             }
         
             $id_rol_seleccionado=$id_rol[0];
         
         
         //Con el Rol traer las tablas a las que puede acceder dicho rol
             $queryllamar_id_tabla=mysqli_query($conn, "SELECT Id_Pantalla FROM rolespantallasacciones WHERE `Id_Rol`=$id_rol_seleccionado;");
         
             $llamar_id_tabla="SELECT Id_Pantalla FROM rolespantallasacciones WHERE `Id_Rol`=$id_rol_seleccionado";
         
             $id_pantalla = array();
         
             $resultado2 = $conn->query($llamar_id_tabla);
         
             $rows2 = $resultado2->num_rows;
             
             $ids = "";
             if($resultado2){
                while($row=$resultado2->fetch_array()){
                // Esto crea un string como 'id1','id2','id3',
                    $ids .= "'".$row['Id_Pantalla'] . "', ";
                }
                // Esto quita el ultimo espacio y coma del string generado con lo cual
                // el string queda 'id1','id2','id3'
             
                $ids = substr($ids,0,-2);
             }
             $queryllamar_nombre_tabla=mysqli_query($conn, "SELECT Nombre FROM pantallas WHERE `Id_Pantalla`in (".$ids.")");
         
             $nombre_tabla = array();
           
             while($datos = mysqli_fetch_array($queryllamar_nombre_tabla)) {
                 array_push($nombre_tabla, $datos['Nombre']);
             }
         $i=0;
         $j=0;
         
         while($i<$rows2){
             if($nombre_tabla[$i]=='ModificarPantallaAcciones'){
                 $j=1;
             }
             $i+=1;
         }
         
         if($j == 1){
            while ($data = mysqli_fetch_assoc($query))
            {
                echo 
                "
                    <tr>

                        <form action='formEditPantallaAcciones.php?id=$data[Id_PantallaAccion]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_PantallaAccion]</th>
                            <td>$data[Id_Pantalla]</td>
                            <td>$data[Id_Acciones]</td>
                            <td>$data[Activo]</td>

                           <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info'>
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoPantallaAcciones/eliminarPantallaAcciones.php?id=$data[Id_PantallaAccion]' name='btneliminar' class='item_tabla btn btn-danger' ><i class='fas fa-trash-alt'></i></a> </td>
                        </form>
                    </tr>

                ";
            }
            }else{
                while ($data = mysqli_fetch_assoc($query))
                {
                    echo 
                    "
                        <tr>
    
                            <form action='formEditNave.php?id=$data[Id_PantallaAccion]' method='POST' name='form2'>
                            <th scope='row'>$data[Id_PantallaAccion]</th>
                            <td>$data[Id_Pantalla]</td>
                            <td>$data[Id_Acciones]</td>
                            <td>$data[Activo]</td>
    
                               <!--BOTON EDITAR-->
    
                                <td class='text-center'> 
                                <!--BOTON EDITAR-->
                                <a class='btn btn-info' >
                                <i class='fas fa-lock'></i>
                                </a>
    
                                <!--BOTON ELIMINAR-->
                                <a  name='btneliminar' class='item_tabla btn btn-danger' '><i class='fas fa-lock'></i></a> </td>
                            </form>
                        </tr>
    
                    ";  
            }
            }
            echo
            "
                </tbody>
                </table>
                <table>
                <thead>
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/pantallaaccionespdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/pantallaaccionesxlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    } 


?>