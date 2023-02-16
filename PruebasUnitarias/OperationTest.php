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
    }
    /* ------------------------------------------------------------------*/
    /*----------- TABLAS MARCELA --------------*/
    /*--------- Tabla de guardar pais ----------*/

    /*public function testGuardarDatos()
    {
    $datosPrueba = array(
        
        'Nombre' => 'Perú',
        'Region' => 'América del sur'
    );

    $objeto = new GuardarPais();
    $resultado = $objeto->guardarDatos($datosPrueba);

    $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}*/

 /*--------- Tabla de guardar region ----------*/
public function testGuardarRegion()
{
$datosPrueba = array(
    
    'Nombre' => 'Asia',
    
);

$objeto = new GuardarRegion();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar moneda ----------*/
public function testGuardarMoneda()
{
    $datosPrueba = array(
    
        'Nombre' => 'Won',
        'ConversionADolar'  => '34.60',
        
    );
    
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

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM pais WHERE Id_Pais='66'";
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
    $nombre = 'Estados Unidos';
    $region = 'América del Norte';
    $id = '66';
    $actualizar = "UPDATE pais SET Nombre='$nombre', Region='$region' WHERE Id_Pais='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(22, $resultado);
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





























  
}

?>