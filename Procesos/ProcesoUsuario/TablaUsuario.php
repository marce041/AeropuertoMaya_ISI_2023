<?php


    class elementosMenu
    {
        public function mostarTablaUsu()
        {
            include "../conexion.php";

            $query = mysqli_query($conn,"SELECT * FROM usuario")
            or die ('error: '.mysqli_error($conn));
            $query2=mysqli_query($conn, "SELECT Id_Rol, Nombre FROM rol");
            echo 
            "
                <table class='table table-sm table-dark table-responsive-sm table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th scope='col'>Id_Usuario</th>
                            <th scope='col'>Nombre Usuario</th>
                            <th scope='col'>Contraseña Encriptada</th>
                            <th scope='col'>Categoria</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>Acciones</th>
                            <th scope='col'>Habilitar<br>Deshabilitar</th>
                            <th scope='col'>Ascender<br>Descender</th>
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
             if($nombre_tabla[$i]=='ModificarUsuario'){
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

                        <form action='formEditUsuario.php?id=$data[idUser]' method='POST' name='form2'>
                            <th scope='row'>$data[idUser]</th>
                            <td>$data[Usuario]</td>
                            <td>$data[Pass]</td>
                            <td>$data[Id_Rol]</td>             
                            <td>$data[Estado]</td>

                            <!--BOTON EDITAR-->

                            <td class='text-center'> 
                            <!--BOTON EDITAR-->
                            <a class='btn btn-info' href='../Procesos/ProcesoUsuario/actualizarUsuario.php?id=$data[idUser]' >
                            <i class='fas fa-edit'></i>
                            </a>

                            <!--BOTON ELIMINAR-->
                            <a href='../Procesos/ProcesoUsuario/eliminarUsuario.php?id=$data[idUser]' name='btneliminar' class='item_tabla btn btn-danger' onclick='return confirm(\"¿Continuar con $data[Usuario]\"); '><i class='fas fa-trash-alt'></i></a> </td>
                        
                            <td class='text-center'> <a class='btn btn-info' href='../Procesos/ProcesoUsuario/HabilitarUsuario.php?id=$data[idUser]'>
                            <i class='fas fa-power-off'></i></td> 

                            <td class='text-center'> <a class='btn btn-info' href='../Procesos/ProcesoUsuario/AscenderUsuario.php?id=$data[idUser]'>
                            <i class='fas fa-arrows-alt-v'></i></td> 
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
    
                            <form action='formEditNave.php?id=$data[idUser]' method='POST' name='form2'>
                            <th scope='row'>$data[idUser]</th>
                            <td>$data[Usuario]</td>
                            <td>$data[Pass]</td>
                            <td>$data[Id_Rol]</td>             
                            <td>$data[Estado]</td>
    
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
                <th scope='col'><a class='btn btn-info' href='../Procesos/Reportes/usuariopdf.php'>Generar PDF
                </a></th>
                            <th scope='col'>
                            <a class='btn btn-info' href='../Procesos/Reportes/usuarioxlsx.php'>Generar EXCEL
                            </a></th>
                            </thead>
                            </table>

            ";
        }
    }

?>