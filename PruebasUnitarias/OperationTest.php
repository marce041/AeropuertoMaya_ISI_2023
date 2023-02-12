<?php
require_once 'C:\xampp\htdocs\AeropuertoMaya_ISI_2023\Procesos\Guardar\pasajeroAdd.php';
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
    /*----------- TABLAS MARCELA --------------*/
    /*--------- Tabla de guardar pais ----------*/

    public function testGuardarDatos()
    {
    $datosPrueba = array(
        
        'Nombre' => 'Colombia',
        'Region' => 'América del sur'
    );

    $objeto = new GuardarPais();
    $resultado = $objeto->guardarDatos($datosPrueba);

    $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}

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



  
}



?>