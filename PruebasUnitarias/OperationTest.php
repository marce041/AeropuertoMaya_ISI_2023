<?php

use PHPUnit\Framework\TestCase;

class ValidateLetters
{
    public function isValidName($name)
    {
        $pattern = "/^[a-zA-ZÀ-ÿ\s]{4,15}$/";
        return preg_match($pattern, $name) === 1;
    }

}

class ValidarString
{
    public function isValid($string)
    {
        $pattern = "^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s[a-zA-ZÀ-ÿ\u00f1\u00d1]+)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$";
        return preg_match("/$pattern/", $string) === 1;
    }

}
   /*----------- TABLAS MARCELA --------------*/ 

 /* ------------ Método de guardar pais -----------*/

class GuardarPais {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        $Region = $conexion->real_escape_string($datos['Region']);
        $query = "INSERT INTO `pais` ( `Nombre`, `Region`)  VALUES ('$Nombre','$Region')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar region -----------*/

class GuardarRegion{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        
        $query = "INSERT INTO `region` ( `Nombre`)  VALUES ('$Nombre')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar moneda -----------*/

class GuardarMoneda{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        $ConversionADolar = $conexion->real_escape_string($datos['ConversionADolar']);
        
        $query = "INSERT INTO `moneda` (`Nombre`, `ConversionADolar`)   VALUES ('$Nombre','$ConversionADolar')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

/* ------------ Método de guardar aeronave -----------*/
class GuardarAeronave{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $matricula = $conexion->real_escape_string($datos['Matricula']);
        $modelo = $conexion->real_escape_string($datos['Modelo']);
        $capacidad = $conexion->real_escape_string($datos['Capacidad']);
        $tamaño = $conexion->real_escape_string($datos['Tamaño']);
        $tipo = $conexion->real_escape_string($datos['Tipo']);
        $area = $conexion->real_escape_string($datos['Area']);

        $query = "INSERT INTO `aeronave` ( `Matricula`, `Modelo`, `Capacidad`, `Tamaño`, `Tipo`, `Area`)  
         VALUES ('$matricula', '$modelo', '$capacidad', '$tamaño', '$tipo', '$area')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}

/* ------------ Método de guardar aeropuerto -----------*/
class GuardarAeropuerto{
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $nombre = $conexion->real_escape_string($datos['Nombre']);
        $hangar = $conexion->real_escape_string($datos['Hangar']);
        $id_ciudad = $conexion->real_escape_string($datos['Id_Ciudad']);
       

        $query = "INSERT INTO `aeropuerto` ( `Nombre`, `Hangar`, `Id_Ciudad`)  
         VALUES ('$nombre', '$hangar', '$id_ciudad')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}


class OperationTest extends TestCase
{
    /* 
    public function testIsValidName()
    {
        $validator = new ValidateLetters();

        $this->assertTrue($validator->isValidName("Marcela Nuñéz"));
        
    }
    
    public function testIsValid()
    {
        $validator = new ValidarString();

        $this->assertTrue($validator->isValid("John Doe"));
        $this->assertFalse($validator->isValid("Jane  Flores"));
        $this->assertTrue($validator->isValid("Marcela Rodríguez"));
        $this->assertFalse($validator->isValid("Joaquín@#@!"));

    }

    
    public function testSoloNumeros()
    {
        $numbers = [1, 2, 3, 4, 5];
        foreach ($numbers as $number) {
            $this->assertTrue($this->acceptOnlyNumbers($number));
        }
    }

    public function testSoloLetras()
    {
        $nonNumbers = ['g', 'b', 'c', 'd'];
        foreach ($nonNumbers as $nonNumber) {
            $this->assertFalse($this->acceptOnlyNumbers($nonNumber));
        }
    }

    private function acceptOnlyNumbers($input)
    {
        return is_numeric($input);
    }*/

    /* ------------------------------------------------------------------*/
    /*----------- TABLAS MARCELA --------------*/
    /*--------- Tabla de guardar pais ----------*/

    public function testGuardarPais()
    {
    $datosPrueba = array(
        
        'Nombre' => 'Argentina',
        'Region' => 'América del sur'
    );
     // Validamos que no hayan simbolos en los datos
 foreach($datosPrueba as $dato) {
    if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
        $this->fail('Uno o más campos contienen símbolos no permitidos.');
    }
}
    // Validamos si algun campo esta vacio
    foreach($datosPrueba as $dato) {
        if(empty($dato)) {
            $this->fail('Uno o más campos están vacíos.');
        }
    }

    $objeto = new GuardarPais();
    $resultado = $objeto->guardarDatos($datosPrueba);

    $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

 /*--------- Tabla de guardar region ----------*/
 
public function testGuardarRegion()
{
$datosPrueba = array(
    
    'Nombre' => 'bebesita',
    
);

 // Validamos que no hayan simbolos en los datos
 foreach($datosPrueba as $dato) {
    if(!preg_match('/^[a-zA-Z0-9]+$/', $dato)) {
        $this->fail('Uno o más campos contienen símbolos no permitidos.');
    }
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}
$objeto = new GuardarRegion();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar moneda ----------*/

public function testGuardarMoneda()
{
    $datosPrueba = array(
    
        'Nombre' => 'ggg',
        'ConversionADolar'  => '4.5',
        
    );
     
    // Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

 // Validamos que el campo 'Nombre' no contenga símbolos ni números
 if(!preg_match('/^[a-zA-Z]+$/', $datosPrueba['Nombre'])) {
    $this->fail('El campo "Nombre" no debe contener símbolos ni números.');
}
   // Validamos que el campo 'ConversionADolar' solo contenga números enteros y decimales
   if(!preg_match('/^[0-9]+(\.[0-9]+)?$/', $datosPrueba['ConversionADolar'])) {
    $this->fail('El campo "ConversionADolar" solo debe contener números enteros y decimales.');
}

    $objeto = new GuardarMoneda();
    $resultado = $objeto->guardarDatos($datosPrueba);
    
    $this->assertTrue($resultado);
}

/*--------- Tabla de guardar aeronave ----------*/

public function testGuardarAeronave()
{
    $datosPrueba = array(
    
        'Matricula' => 'RRH123',
        'Modelo'  => 'Dassault Falcon',
        'Capacidad' => '700',
        'Tamaño'  => '1300',
        'Tipo' => 'Comercial',
        'Area'  => 'Personal',
        
    );
    
    // Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}
    $objeto = new GuardarAeronave();
    $resultado = $objeto->guardarDatos($datosPrueba);
    
    $this->assertTrue($resultado);
    
}


/*--------- Tabla de guardar aeropuerto ----------*/

public function testGuardarAeropuerto()
{
    $datosPrueba = array(
    
        'Nombre' => 'AeroYork',
        'Hangar'  => '59',
        'Id_Ciudad' => '1',   
    );
    
    // Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}
    $objeto = new GuardarAeropuerto();
    $resultado = $objeto->guardarDatos($datosPrueba);
    
    $this->assertTrue($resultado);
    
}
/* FIN DEL METODO GUARDAR */
/* ------------------------------------------------------------------*/
/* INICIO DEL METODO ELIMINAR */

/* ------------  METODO ELIMINAR PAIS --------------- */

public function testEliminarPais()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";


  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
  // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM pais WHERE Id_Pais='56'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM pais WHERE Id_Pais='56'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}
/*------------ METODO ELIMINAR AERONAVE ---------------- */
public function testEliminarAeronave()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;

   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM aeronave WHERE Id_Aeronave='74'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM aeronave WHERE Id_Aeronave='74'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/*------------ METODO ELIMINAR AEROPUERTO ---------------- */



public function testEliminarAeropuerto()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM aeropuerto WHERE Id_Aeropuerto='53'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM aeropuerto WHERE Id_Aeropuerto='53'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}


/* ---------------- METODO ELIMINAR MONEDA -------------*/

public function testEliminarMoneda()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;

   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM moneda WHERE Id_Moneda='62'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}
  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM moneda WHERE Id_Moneda='62'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}


/* ---------------- METODO ELIMINAR REGION -------------*/


public function testEliminarRegion()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";

  // Conectar a la base de datos de prueba.
  $conn = new mysqli($servername, $username, $password, $database);

  // Obtener el ID del registro insertado.
  $id = $conn->insert_id;
   // Validar que existe un registro con el ID proporcionado.
$validacion = "SELECT * FROM region WHERE Id_Region='18'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM region WHERE Id_Region='18'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}




/* ------------------------------------------------------------------*/
/* INICIO DEL METODO EDITAR O ACTUALIZAR */

/* PRUEBA: EDITAR TABLA PAIS */

public function testActualizarPais()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'Estados@@ Unidos';
    $region = 'América del Norte';
    $id = '66';
 
    $actualizar = "UPDATE pais SET Nombre='$nombre', Region='$region' WHERE Id_Pais='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(22, $resultado);
}




/*------------- EDITAR REGION --------------*/

public function testActualizarRegion()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'los chinitos';
    $id = '26';
    $actualizar = "UPDATE region SET Nombre='$nombre' WHERE Id_Region='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(26, $resultado);
}




/*------------- EDITAR AEROPUERTO ----------- */
public function testActualizarAeropuerto()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'quepedo que pex';
    $hangar ='123';
    $id_ciudad = '2';
    $id = '4';
    $actualizar = "UPDATE aeropuerto SET Nombre='$nombre',Hangar='$hangar',Id_Ciudad='$id_ciudad' WHERE Id_Aeropuerto='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}


/*------------- EDITAR AERONAVE ----------- */

public function testActualizarAeronave()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $matricula = 'HSS128';
    $modelo ='todos';
    $capacidad = '2';
    $tamaño = '1234';
    $tipo='hh';
    $area= 'gg';
    $id='19';
    $actualizar = "UPDATE aeronave SET Matricula='$matricula', Modelo='$modelo',
    Capacidad = '$capacidad',Tamaño = '$tamaño',Tipo = '$tipo', Area = '$area' WHERE Id_Aeronave='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(19, $resultado);
}
/*------------- EDITAR MONEDA ----------- */

public function testActualizarMoneda()
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'akndsjdb';
    $conversion ='4.09';
    $id='4';
    $actualizar = "UPDATE moneda SET Nombre='$nombre', ConversionADolar='$conversion'
    WHERE Id_Moneda='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(4, $resultado);
}
/* ------------------------------------------------------ */
/* ----------------------- MÉTODO DE LISTAR -----------------------------*/
/* --------------PRUEBAS MARCELA : TABLA LISTAR PAISES ---------------- */

public function testSelectAllPais()
    {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";
        $conexion = new mysqli($servername, $username, $password, $database);

        // Ejecutar el query
        $resultado = mysqli_query($conexion, "SELECT * FROM pais");

        // Verificar que el resultado es un objeto mysqli_result válido
        $this->assertInstanceOf(mysqli_result::class, $resultado);

      
        // Imprimir los resultados en una tabla HTML
     echo '<table>';
     echo '<tr><th>ID</th><th>Nombre</th><th>Region</th></tr>';
     while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '<tr><td>' . $fila['Id_Pais'] . '</td><td>' . $fila['Nombre'] . '</td><td>' . $fila['Region'] . '</td></tr>';
    }
    echo '</table>';
       
        // Liberar los recursos
        mysqli_free_result($resultado);
        mysqli_close($conexion);
}




/* --------------PRUEBAS MARCELA : TABLA LISTAR Aeropuerto ---------------- */
public function testListarAeropuerto()
    {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";
        $conexion = new mysqli($servername, $username, $password, $database);

        // Ejecutar el query
        $resultado = mysqli_query($conexion, "SELECT * FROM aeropuerto");

        // Verificar que el resultado es un objeto mysqli_result válido
        $this->assertInstanceOf(mysqli_result::class, $resultado);

      
        // Imprimir los resultados en una tabla HTML
     echo '<table>';
     echo '<tr>
       ------------------- AEROPUERTOS --------------
     <th> ID AEROPUERTO </th> <th> NOMBRE </th> <th>HANGAR</th> <th> ID CIUDAD </th> 
     </tr>';
     while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '--' . $fila['Id_Aeropuerto'] . '--' 
    . $fila['Nombre'] . '--' 
    . $fila['Hangar'] . '--' 
    . $fila['Id_Ciudad'] . '</td></tr>';
    }
    echo '</table>';
       
        // Liberar los recursos
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    }




/* --------------PRUEBAS MARCELA : TABLA LISTAR AERONAVE ---------------- */

public function testListarAeronave()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM aeronave");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------AERONAVES -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de aeronave: ' . $fila['Id_Aeronave'] ."\n" .
        'Matricula: '  . $fila['Matricula'] .  "\n" .
        'Modelo: ' . $fila['Modelo'] . "\n" .
        'Capacidad: '  . $fila['Capacidad'] ."\n" .
        'Tamaño:'. $fila['Tamaño'] ."\n" .
        'Tipo:' . $fila['Tipo'] ."\n" .
        'Area: ' . $fila['Area'] . "\n" .
        
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS MARCELA : TABLA LISTAR MONEDA ---------------- */

public function testListarMoneda()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM moneda");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------MONEDAS -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de moneda: ' . $fila['Id_Moneda'] ."\n" .
        'Nombre: '  . $fila['Nombre'] .  "\n" .
        'Conversion: ' . $fila['ConversionADolar'] . "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS MARCELA : TABLA LISTAR REGION ---------------- */



public function testListarRegion()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM region");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------REGIONES -------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de región: ' . $fila['Id_Region'] ."\n" .
        'Nombre: '  . $fila['Nombre'] .  "\n" .
       
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}




















  
}

?>