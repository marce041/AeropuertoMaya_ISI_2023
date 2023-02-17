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
/*----------- TABLAS EDUARDO --------------*/ 

 /* ------------ Método de guardar boleto -----------*/

 class GuardarBoleto {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Id_Asiento = $conexion->real_escape_string($datos['Id_Asiento']);
        $Id_Pasajero = $conexion->real_escape_string($datos['Id_Pasajero']);
        $Id_Vuelo = $conexion->real_escape_string($datos['Id_Vuelo']);
        $Id_Equipaje = $conexion->real_escape_string($datos['Id_Equipaje']);
        $Id_Clase = $conexion->real_escape_string($datos['Id_Clase']);
        $Precio = $conexion->real_escape_string($datos['Precio']);
        $query = "INSERT INTO `boleto` ( `Codigo`, `Id_Asiento`, `Id_Pasajero`, `Id_Vuelo`, `Id_Equipaje`, `Id_Clase`, `Precio`)  VALUES ('$Codigo','$Id_Asiento', '$Id_Pasajero', '$Id_Vuelo', '$Id_Equipaje', '$Id_Clase', '$Precio')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar ciudad -----------*/

class GuardarCiudad {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Nombre = $conexion->real_escape_string($datos['Nombre']);
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Terminal = $conexion->real_escape_string($datos['Terminal']);
        $Id_Pais = $conexion->real_escape_string($datos['Id_Pais']);
        $query = "INSERT INTO `ciudad` (`Nombre`, `Codigo`, `Terminal`, `Id_Pais`)  VALUES ('$Nombre','$Codigo','$Terminal', '$Id_Pais')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar equipaje -----------*/

class GuardarEquipaje {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Peso = $conexion->real_escape_string($datos['Peso']);
        $Cantidad = $conexion->real_escape_string($datos['Cantidad']);
        $MultiplicadorPrecio = $conexion->real_escape_string($datos['MultiplicadorPrecio']);
        $query = "INSERT INTO `equipaje` (`Peso`, `Cantidad`, `MultiplicadorPrecio`)  VALUES ('$Peso','$Cantidad','$MultiplicadorPrecio')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar vuelo -----------*/

class GuardarVuelo {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Lugar_Salida = $conexion->real_escape_string($datos['Lugar_Salida']);
        $Lugar_LLegada = $conexion->real_escape_string($datos['Lugar_LLegada']);
        $Hora_Salida = $conexion->real_escape_string($datos['Hora_Salida']);
        $Hora_LLegada = $conexion->real_escape_string($datos['Hora_LLegada']);
        $Fecha = $conexion->real_escape_string($datos['Fecha']);
        $Precio = $conexion->real_escape_string($datos['Precio']);
        $Id_Aeronave = $conexion->real_escape_string($datos['Id_Aeronave']);
        $query = "INSERT INTO `vuelo` (`Codigo`, `Lugar_Salida`, `Lugar_LLegada`, `Hora_Salida`, `Hora_LLegada`, `Fecha`, `Precio`, `Id_Aeronave`)  VALUES ('$Codigo','$Lugar_Salida','$Lugar_LLegada', '$Hora_Salida', '$Hora_LLegada', '$Fecha', '$Precio', '$Id_Aeronave')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar parametro -----------*/

class GuardarParametros {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Cai = $conexion->real_escape_string($datos['Cai']);
        $Fecha_Ven = $conexion->real_escape_string($datos['Fecha_Ven']);
        $Fecha_Emi = $conexion->real_escape_string($datos['Fecha_Emi']);
        $Rango_Ini = $conexion->real_escape_string($datos['Rango_Ini']);
        $Rango_Fin = $conexion->real_escape_string($datos['Rango_Fin']);
        $Consecutivo = $conexion->real_escape_string($datos['Consecutivo']);
        $Estado = $conexion->real_escape_string($datos['Estado']);
        $query = "INSERT INTO `parametro` (`Cai`, `Fecha_Ven`, `Fecha_Emi`, `Rango_Ini`, `Rango_Fin`, `Consecutivo`, `Estado`)  VALUES ('$Cai','$Fecha_Ven','$Fecha_Emi', '$Rango_Ini', '$Rango_Fin', '$Consecutivo', '$Estado')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar paseabordar -----------*/

class GuardarPaseabordar {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Fecha = $conexion->real_escape_string($datos['Fecha']);
        $Puerta_Embarque = $conexion->real_escape_string($datos['Puerta_Embarque']);
        $Id_Boleto = $conexion->real_escape_string($datos['Id_Boleto']);
        $Id_Pasajero = $conexion->real_escape_string($datos['Id_Pasajero']);
        $query = "INSERT INTO `paseabordar` (`Codigo`, `Fecha`, `Puerta_Embarque`, `Id_Boleto`, `Id_Pasajero`)  VALUES ('$Codigo','$Fecha','$Puerta_Embarque', '$Id_Boleto', '$Id_Pasajero')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar reserva -----------*/

class GuardarReserva {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Codigo = $conexion->real_escape_string($datos['Codigo']);
        $Id_Vuelo = $conexion->real_escape_string($datos['Id_Vuelo']);
        $Precio = $conexion->real_escape_string($datos['Precio']);
        $query = "INSERT INTO `reserva` (`Codigo`, `Id_Vuelo`, `Precio`)  VALUES ('$Codigo','$Id_Vuelo','$Precio')";
        $resultado = $conexion->query($query);
        $conexion->close();
        return $resultado; // Devuelve verdadero si se ha guardado correctamente, falso si no
    }
}
/* ------------ Método de guardar usuario -----------*/

class GuardarUsuario {
    public function guardarDatos($datos) {
        $servername="localhost";
        $username="root";
        $password="";
        $database="aeropuertomaya";

        $conexion = new mysqli($servername, $username, $password, $database);
       
        $Usuario = $conexion->real_escape_string($datos['Usuario']);
        $Pass = $conexion->real_escape_string($datos['Pass']);
        $Estado = $conexion->real_escape_string($datos['Estado']);
        $query = "INSERT INTO `usuario` (`Usuario`, `Pass`, `Estado`)  VALUES ('$Usuario','$Pass','$Estado')";
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
/*----------- TABLAS EDUARDO --------------*/
    /*--------- Tabla de guardar boleto ----------*/

    public function testGuardarBoleto()
    {
    $datosPrueba = array(
        
        'Codigo' => '20HOLA',
        'Id_Asiento' => '1',
        'Id_Pasajero' => '4',
        'Id_Vuelo' => '1',
        'Id_Equipaje' => '2',
        'Id_Clase' => '1',
        'Precio' => '200'
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

    $objeto = new GuardarBoleto();
    $resultado = $objeto->guardarDatos($datosPrueba);

    $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar ciudad ----------*/

public function testGuardarCiudad()
{
$datosPrueba = array(
    
    'Nombre' => 'Roatan',
    'Codigo' => '20234',
    'Terminal' => '13',
    'Id_Pais' => '1'
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

$objeto = new GuardarCiudad();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar equipaje ----------*/

public function testGuardarEquipaje()
{
$datosPrueba = array(
    
    'Peso' => '40',
    'Cantidad' => '3',
    'MultiplicadorPrecio' => '1.5'
);
 // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
if(!preg_match('/^[0-9.]+$/', $dato)) {
    $this->fail('Uno o más campos contienen símbolos no permitidos.');
}
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new GuardarEquipaje();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
 /*--------- Tabla de guardar vuelo ----------*/

 public function testGuardarVuelo()
 {
 $datosPrueba = array(
     
     'Codigo' => '20HOLA',
     'Lugar_Salida' => 'Tocontin IA',
     'Lugar_LLegada' => 'Goloson IA',
     'Hora_Salida' => '03:40:00',
     'Hora_LLegada' => '05:45:00',
     'Fecha' => '2023-02-17',
     'Precio' => '200',
     'Id_Aeronave' => '18'
 );
  // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
 if(!preg_match('/^[a-zA-Z0-9: -]+$/', $dato)) {
     $this->fail('Uno o más campos contienen símbolos no permitidos.');
 }
}
 // Validamos si algun campo esta vacio
 foreach($datosPrueba as $dato) {
     if(empty($dato)) {
         $this->fail('Uno o más campos están vacíos.');
     }
 }

 $objeto = new GuardarVuelo();
 $resultado = $objeto->guardarDatos($datosPrueba);

 $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar parametro ----------*/

public function testGuardarParametros()
{
$datosPrueba = array(
    
    'Cai' => '20HOLA',
    'Fecha_Ven' => '2023-05-28',
    'Fecha_Emi' => '2023-02-17',
    'Rango_Ini' => '001-001-01-00000100',
    'Rango_Fin' => '001-001-01-00000110',
    'Consecutivo' => '100',
    'Estado' => '1'
);
 // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
if(!preg_match('/^[-a-zA-Z0-9]+$/', $dato)) {
    $this->fail('Uno o más campos contienen símbolos no permitidos.');
}
}
// Validamos si algun campo esta vacio
foreach($datosPrueba as $dato) {
    if(empty($dato)) {
        $this->fail('Uno o más campos están vacíos.');
    }
}

$objeto = new GuardarParametros();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
 /*--------- Tabla de guardar paseabordar ----------*/

 public function testGuardarPaseabordar()
 {
 $datosPrueba = array(
     
     'Codigo' => '20HOLA',
     'Fecha' => '2023-02-17',
     'Puerta_Embarque' => 'H0L423',
     'Id_Boleto' => '4',
     'Id_Pasajero' => '1'
 );
  // Validamos que no hayan simbolos en los datos
foreach($datosPrueba as $dato) {
 if(!preg_match('/^[-a-zA-Z0-9]+$/', $dato)) {
     $this->fail('Uno o más campos contienen símbolos no permitidos.');
 }
}
 // Validamos si algun campo esta vacio
 foreach($datosPrueba as $dato) {
     if(empty($dato)) {
         $this->fail('Uno o más campos están vacíos.');
     }
 }

 $objeto = new GuardarPaseabordar();
 $resultado = $objeto->guardarDatos($datosPrueba);

 $this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar reserva ----------*/

public function testGuardarReserva()
{
$datosPrueba = array(
    
    'Codigo' => '20HOLA',
    'Id_Vuelo' => '1',
    'Precio' => '400'
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

$objeto = new GuardarReserva();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
}
/*--------- Tabla de guardar usuario ----------*/

public function testGuardarUsuario()
{
$datosPrueba = array(
    
    'Usuario' => 'Prueba',
    'Pass' => '2023',
    'Estado' => '1'
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

$objeto = new GuardarUsuario();
$resultado = $objeto->guardarDatos($datosPrueba);

$this->assertTrue($resultado); // Comprobamos que el método ha guardado los datos correctamente
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
/*----------- ELIMINAR EDUARDO --------------*/
/* ------------  METODO ELIMINAR BOLETO --------------- */

public function testEliminarBoleto()
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
$validacion = "SELECT * FROM boleto WHERE Id_Boleto='28'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM boleto WHERE Id_Boleto='28'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR CIUDAD --------------- */

public function testEliminarCiudad()
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
$validacion = "SELECT * FROM ciudad WHERE Id_Ciudad='25'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM ciudad WHERE Id_Ciudad='25'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR EQUIPAJE --------------- */

public function testEliminarEquipaje()
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
$validacion = "SELECT * FROM equipaje WHERE Id_Equipaje='23'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM equipaje WHERE Id_Equipaje='23'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR VUELO --------------- */

public function testEliminarVuelo()
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
$validacion = "SELECT * FROM vuelo WHERE Id_Vuelo='15'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM vuelo WHERE Id_Vuelo='15'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR PARAMETRO --------------- */

public function testEliminarParametro()
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
$validacion = "SELECT * FROM parametro WHERE Id_Parametro='17'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM parametro WHERE Id_Parametro='17'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR PASEABORDAR --------------- */

public function testEliminarPaseabordar()
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
$validacion = "SELECT * FROM paseabordar WHERE Id_Pase='15'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM paseabordar WHERE Id_Pase='15'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR RESERVA --------------- */

public function testEliminarReserva()
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
$validacion = "SELECT * FROM reserva WHERE Id_Reserva='17'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM reserva WHERE Id_Reserva='17'";
  $resultado = $conn->query($eliminar);

  // Comprobar que el registro ha sido eliminado correctamente.
  $this->assertTrue($resultado, "No se pudo eliminar el registro");

  // Cerrar la conexión a la base de datos de prueba.
  $conn->close();
}

/* ------------  METODO ELIMINAR USUARIO --------------- */

public function testEliminarUsuario()
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
$validacion = "SELECT * FROM usuario WHERE idUser='26'";
$resultadoValidacion = $conn->query($validacion);
if ($resultadoValidacion->num_rows === 0) {
    throw new Exception("No se encontró ningún registro con el ID proporcionado.");
}

  // Llamar al código de eliminación con el ID del registro insertado.
  $eliminar = "DELETE FROM usuario WHERE idUser='26'";
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
/* EDITAR EDUARDO*/
/* PRUEBA: EDITAR TABLA BOLETO */

public function testActualizarBoleto() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'C4MBI0';
    $id_Asiento = '12';
    $id_Pasajero = '1';
    $id_Vuelo = '1';
    $id_Equipaje = '1';
    $id_Clase = '1';
    $precio = '400';
    $estado = '1';
    $id = '29';
 
    $actualizar = "UPDATE boleto SET Codigo='$codigo', Id_Asiento='$id_Asiento', Id_Pasajero='$id_Pasajero', 
    Id_Vuelo='$id_Vuelo', Id_Equipaje='$id_Equipaje', Id_Clase='$id_Clase', Precio='$precio', Estado='$estado' WHERE Id_Boleto='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(29, $resultado);
}
/* PRUEBA: EDITAR TABLA CIUDAD */

public function testActualizarCiudad() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $nombre = 'cambio';
    $codigo = '2023';
    $terminal = '12';
    $id_Pais = '1';
    $id = '27';
 
    $actualizar = "UPDATE ciudad SET Nombre='$nombre', Codigo='$codigo', Terminal='$terminal', Id_Pais='$id_Pais' WHERE Id_Ciudad='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(27, $resultado);
}
/* PRUEBA: EDITAR TABLA EQUIPAJE */

public function testActualizarEquipaje() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $peso = '40';
    $cantidad = '2';
    $multiplicador = '0.25';
    $id = '27';
 
    $actualizar = "UPDATE equipaje SET Peso='$peso', Cantidad='$cantidad', MultiplicadorPrecio='$multiplicador' WHERE Id_Equipaje='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(27, $resultado);
}
/* PRUEBA: EDITAR TABLA VUELO */

public function testActualizarVuelo() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'EDU203';
    $lugar_sal = 'mi casa';
    $lugar_lle = 'ujcv';
    $hora_sal = '14:17:00';
    $hora_lle = '16:30:00';
    $fecha = '2023/02/17';
    $precio = '150';
    $id_Aeronave = '20';
    $id = '29';
 
    $actualizar = "UPDATE vuelo SET Codigo='$codigo', Lugar_salida='$lugar_sal', Lugar_LLegada='$lugar_lle', Hora_Salida='$hora_sal', Hora_LLegada='$hora_lle', Fecha='$fecha', Precio='$precio', Id_Aeronave='$id_Aeronave'  WHERE Id_Vuelo='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(29, $resultado);
}
/* PRUEBA: EDITAR TABLA PARAMETRO */

public function testActualizarParametro() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $cai = 'EDU203';
    $fecha_Ven = '2023-05-12';
    $fecha_Emi = '2023-02-17';
    $rango_Ini = '001-001-01-00000100';
    $rango_Fin = '001-001-01-00000110';
    $consecutivo = '100';
    $estado = '1';
    $id = '31';
 
    $actualizar = "UPDATE parametro SET Cai='$cai', Fecha_Ven='$fecha_Ven', Fecha_Emi='$fecha_Emi', Rango_Ini='$rango_Ini', Rango_Fin='$rango_Fin', Consecutivo='$consecutivo', Estado='$estado'  WHERE Id_Parametro='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(31, $resultado);
}
/* PRUEBA: EDITAR TABLA PASEABORDAR */

public function testActualizarPaseabordar() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'EDU203';
    $fecha = '2023-02-17';
    $puerta_Embarque = '3312XD';
    $id_Boleto = '4';
    $id_Pasajero = '4';
    $id = '30';
 
    $actualizar = "UPDATE paseabordar SET Codigo='$codigo', Fecha='$fecha', Puerta_Embarque='$puerta_Embarque', Id_Boleto='$id_Boleto', Id_Pasajero='$id_Pasajero'  WHERE Id_Pase='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(30, $resultado);
}
/* PRUEBA: EDITAR TABLA RESERVA */

public function testActualizarReserva() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $codigo = 'EDU203';
    $id_Vuelo = '2';
    $precio = '500';
    $id = '29';
 
    $actualizar = "UPDATE reserva SET Codigo='$codigo', Id_Vuelo='$id_Vuelo', Precio='$precio'  WHERE Id_Reserva='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(29, $resultado);
}
/* PRUEBA: EDITAR TABLA USUARIO */

public function testActualizarUsuario() 
{
    // Crear objeto de conexión a la base de datos
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    // Crear objeto de la consulta SQL a probar
    $usuario = 'EDU2023';
    $pass = '2023';
    $estado = '1';
    $id = '40';
 
    $actualizar = "UPDATE usuario SET Usuario='$usuario', Pass='$pass', Estado='$estado'  WHERE idUser='$id'";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($actualizar);
    
    // Verificar que la consulta se ha ejecutado correctamente
    $this->assertEquals(40, $resultado);
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
/* --------------PRUEBAS EDUARDO : TABLA LISTAR BOLETO ---------------- */

public function testListarBoleto()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM boleto");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------BOLETOS-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Boleto: ' . $fila['Id_Boleto'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Id del Asiento: '  . $fila['Id_Asiento'] .  "\n" .
        'Id de Pasajero: '  . $fila['Id_Pasajero'] .  "\n" .
        'Id de Vuelo: '  . $fila['Id_Vuelo'] .  "\n" .
        'Id de Equipaje: '  . $fila['Id_Equipaje'] .  "\n" .
        'Id de Clase: '  . $fila['Id_Clase'] .  "\n" .
        'Precio: '  . $fila['Precio'] .  "\n" .
        'Estado: '  . $fila['Estado'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR CIUDAD ---------------- */

public function testListarCiudad()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM ciudad");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------CIUDAD-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de la Ciudad: ' . $fila['Id_Ciudad'] ."\n" .
        'Nombre: '  . $fila['Nombre'] .  "\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Terminal: '  . $fila['Terminal'] .  "\n" .
        'Id de Pais: '  . $fila['Id_Pais'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR EQUIPAJE ---------------- */

public function testListarEquipaje()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM equipaje");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------EQUIPAJE-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Equipaje: ' . $fila['Id_Equipaje'] ."\n" .
        'Peso: '  . $fila['Peso'] .  "\n" .
        'Cantidad: '  . $fila['Cantidad'] .  "\n" .
        'Multiplicador de Precio: '  . $fila['MultiplicadorPrecio'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR VUELO ---------------- */

public function testListarVuelo()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM vuelo");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------VUELO-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Vuelo: ' . $fila['Id_Vuelo'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Lugar de Salida: '  . $fila['Lugar_Salida'] .  "\n" .
        'Lugar de LLegada: '  . $fila['Lugar_LLegada'] .  "\n" .
        'Hora de Salida: '  . $fila['Hora_Salida'] .  "\n" .
        'Hora de LLegada: '  . $fila['Hora_LLegada'] .  "\n" .
        'Fecha: '  . $fila['Fecha'] .  "\n" .
        'Precio: '  . $fila['Precio'] .  "\n" .
        'Id de Aeronave: '  . $fila['Id_Aeronave'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR PARAMETRO ---------------- */

public function testListarParametro()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM parametro");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------PARAMETRO-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Parametro: ' . $fila['Id_Parametro'] ."\n" .
        'Cai: '  . $fila['Cai'] .  "\n" .
        'Fecha de vencimiento: '  . $fila['Fecha_Ven'] .  "\n" .
        'Fecha de emicion: '  . $fila['Fecha_Emi'] .  "\n" .
        'Rango de inicio: '  . $fila['Rango_Ini'] .  "\n" .
        'Rango final: '  . $fila['Rango_Fin'] .  "\n" .
        'Consecutivo: '  . $fila['Consecutivo'] .  "\n" .
        'Estado: '  . $fila['Estado'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR PASE DE ABORDAR ---------------- */

public function testListarPaseabordar()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM paseabordar");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------PASE DE ABORDAR-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Pase de abordar: ' . $fila['Id_Pase'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Fecha: '  . $fila['Fecha'] .  "\n" .
        'Puerta de embarque: '  . $fila['Puerta_Embarque'] .  "\n" .
        'Id del Boleto: '  . $fila['Id_Boleto'] .  "\n" .
        'Id del Pasajero: '  . $fila['Id_Pasajero'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR RESERVA ---------------- */

public function testListarReserva()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM reserva");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------RESERVA-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id de la Reserva: ' . $fila['Id_Reserva'] ."\n" .
        'Codigo: '  . $fila['Codigo'] .  "\n" .
        'Id del Vuelo: '  . $fila['Id_Vuelo'] .  "\n" .
        'Precio: '  . $fila['Precio'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}
/* --------------PRUEBAS EDUARDO : TABLA LISTAR USUARIO ---------------- */

public function testListarUsuario()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="aeropuertomaya";
    $conexion = new mysqli($servername, $username, $password, $database);

    // Ejecutar el query
    $resultado = mysqli_query($conexion, "SELECT * FROM usuario");

    // Verificar que el resultado es un objeto mysqli_result válido
    $this->assertInstanceOf(mysqli_result::class, $resultado);

    echo '<tr> -----------USUARIO-------------</tr>';
     while ($fila = mysqli_fetch_assoc($resultado))
     {
        
        echo 
        'Id del Usuario: ' . $fila['idUser'] ."\n" .
        'Usuario: '  . $fila['Usuario'] .  "\n" .
        'Pass: '  . $fila['Pass'] .  "\n" .
        'Estado: '  . $fila['Estado'] .  "\n" .
        
        '</td></tr>';

     }
     echo '</table>';
       
     // Liberar los recursos
     mysqli_free_result($resultado);
     mysqli_close($conexion);



}




















  
}

?>