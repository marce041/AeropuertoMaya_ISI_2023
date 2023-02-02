<?php
    include ("../conexion.php");
    $query=mysqli_query($conn, "SELECT Id_Pais, Nombre FROM pais");


    // $buscar="SELECT `IDProveedor`, `RTN` FROM proveedores;";
    // $resultado=mysqli_query($conn, $buscar);
    
    if(isset($_POST['estado2'])) {
        $estado2=$_POST['estado2'];
        echo $estado2;
    }
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <title>Pasajero</title>



    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../style/cuerpo/Dashboard-2.min.css" rel="stylesheet">
    <link href="../style/cuerpo/dashboard.css" rel="stylesheet">
    <link href="../style/Dashboard/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top">
    <div id="wrapper">
        <!--Empieza Lista -->
        <ul class="navbar-nav color sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../principaladmin.php">
                <div class="sidebar-brand-text mx-3">Administracion</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="../principaladmin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Datos
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Datos Maestros</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="tripulacion.php">Tripulación</a>
                        <a class="collapse-item" href="personaltierra.php">Personal de tierra</a>
                        <a class="collapse-item" href="aeronave.php">Aeronave</a>
                        <a class="collapse-item" href="aeropuerto.php">Aeropuerto</a>
                        <a class="collapse-item" href="boleto.php">Boleto</a>
                        <a class="collapse-item" href="pais.php">Pais</a>
                        <a class="collapse-item" href="ciudad.php">Ciudad</a>
                        <a class="collapse-item" href="pasajero.php">Pasajero</a>
                        <a class="collapse-item" href="paseabordar.php">Pase de abordar</a>
                        <a class="collapse-item" href="vuelo.php">Vuelo</a>
                        <a class="collapse-item" href="factura.php">Factura</a>
                        <a class="collapse-item" href="hangares.php">Hangar</a>
                        <a class="collapse-item" href="reserva.php">Reserva</a>
                        <a class="collapse-item" href="clase.php">Clase</a>
                        <a class="collapse-item" href="conversion.php">Conversion</a>
                        <a class="collapse-item" href="checkin.php">Check-In</a>
                        <a class="collapse-item" href="equipaje.php">Equipaje</a>
                    </div>
                </div>
            </li>

        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Consultas</span>
                </a>
                <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                    <a class="collapse-item" href="../Consultas/Consultaaeropuertos.php">Aeropuertos</a>
                        <a class="collapse-item" href="../Consultas/Consultaseronaves.php">Aeronaves</a>
                        <a class="collapse-item" href="../Consultas/Consultapaises.php">Paises</a>
                        <a class="collapse-item" href="../Consultas/Consultaboletos.php">Boleto</a>
                        <a class="collapse-item" href="../Consultas/Consultacuidades.php">Cuidades</a>
                        <a class="collapse-item" href="../Consultas/Consultapasajeros.php">Pasajeros</a>
                        <a class="collapse-item" href="../Consultas/Consultapaseabordar.php">Pase de Abordar</a>
                        <a class="collapse-item" href="../Consultas/ConsultaPersonaltierra.php">Personal de Tierra</a>
                        <a class="collapse-item" href="../Consultas/Consultatripulacion.php">Tripulacion</a>
                        <a class="collapse-item" href="../Consultas/Consultavuelo.php">Vuelo</a>
                        <a class="collapse-item" href="../Consultas/Consultahangar.php">Hangar</a>
                        <a class="collapse-item" href="../Consultas/Consultacheckin.php">Check-In</a>
                        <a class="collapse-item" href="../Consultas/Consultareserva.php">Reserva</a>
                        <a class="collapse-item" href="../Consultas/Consultamoneda.php">Moneda</a>
                        <a class="collapse-item" href="../Consultas/Consultaclase.php">Clase</a>
                        <a class="collapse-item" href="../Consultas/Consultafactura.php">Factura</a>
                        <a class="collapse-item" href="../Consultas/Consultafactura.php">Equipaje</a>
                       
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Seguridad</span>
                </a>
                <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../Seguridad/usuario.php">Usuario</a>
                        <a class="collapse-item" href="../Seguridad/Consultausuarios.php">Consulta de Usuarios</a>
                    </div>
                </div>
            </li>
        </ul>
        <!--Termina Lista -->
        <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                <h2>Pasajero</h2>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/Icono/Usuario.png">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil.php">
              
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Contenido -->
                <div class="col-auto text-center">
                    <!-- Tajeta y Contenido -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Insertar Datos
                            </h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 needs-validation" id="formularioRegistro" action="../Procesos/Guardar/pasajeroAdd.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                  <input class="form-control" name="nombre" type="text" placeholder="Nombre y Apellido" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode>=160 && event.charCode<=165 || event.charCode===32 || event.keyCode"  minlength="10" maxlength="25" required pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1]+ (\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" title="Ingrese Su Primer Nombre y Primer Apellido">
                                </div>
                                <div class="mb-3">
                                <label for="documentos">Documentación</label>
                                <select class= "form-select" name="estado" id="documentos">
                                <datalist id="documentos">
                                <option value="DNI">DNI</option>
                                <option value="Pasaporte">Pasaporte</option>
                                </datalist>
                                </select> 
                                </div>
                                <div class="mb-3">
                                  <input class="form-control" name="numerodoc" type="text" placeholder="Número de Documento" onkeypress="return event.charCode>=48 && event.charCode<=57"  minlength="13" maxlength="13" required pattern="[0-1][0-9]+" title="su numero de documento debe de empezar con 1/0">
                                </div>
                                <div class="mb-3">
                                  <input class="form-control" name="telefono"  type="tel" placeholder="Teléfono" onkeypress="return event.charCode>=48 && event.charCode<=57" minlength="8" maxlength="8" required pattern="[2-3][0-9]+|[7-9][0-9]+" title="su numero de teléfono debe de empezar con 2,3,7,8 o 9">
                                </div>
                                <div class="mb-3">
                                  <input class="form-control" name="correo" type="text" placeholder="Correo Electrónico" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode===64 || event.charCode===46"  minlength="11" maxlength="50" required pattern="[a-zA-Z0-9.]+@[a-zA-Z0-9]+(.com)+|[a-zA-Z0-9.]+@[a-zA-Z0-9]+(.net)+|[a-zA-Z0-9.]+@[a-zA-Z0-9]+(.hn)" title="ejemplo@ejemplo.com/net/hn">
                                </div>
                                <div class="mb-3">
                                    <label for="rol">País</label>
                                    <select class="form-select" name="estado2" id="pais">
                                    
                                    <?php 
                                        while($datos = mysqli_fetch_array($query))
                                        {
                                    ?>
                                            <option value="<?php echo $datos['Id_Pais']?>"><?php echo $datos['Nombre']?> </option>
                                    <?php
                                        }
                                    ?> 
                                    </select>
                                </div>
                                <div class="mb-3">
                                <label for="rol">Fecha de nacimiento</label>
                                  <input class="form-control" name="fechaN" id="fechaN" type="date"  max="2004-12-31" min="1930-01-01" onkeypress="return event.charCode>=0128" required>
                                </div>
                              <div class="col-md-12  mt-5 text-center">
                                   <button class="btn btn-primary" name="btnnombre" type="submit">Guardar</button>
                              </div>
                      </form>
                        </div>
                    </div>
                </div>
                <!-- Fin de Contenido -->
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aerolinea Maya 2022</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Desea Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" Si asi lo desea.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../index.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../style/Dashboard/jquery/jquery.min.js"></script>
    <script src="../style/Dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../style/Dashboard/jquery-easing/jquery.easing.min.js"></script>
    <script src="../style/js/Dashboard-2.min.js"></script>
    <script src="../style/Dashboard/chart.js/Chart.min.js"></script>
    <script src="../style/js/demo/chart-area-demo.js"></script>
    <script src="../style/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>