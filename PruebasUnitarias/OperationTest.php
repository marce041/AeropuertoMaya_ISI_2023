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

class AgregarPasajero{
    public function testPasajeroAdd()
    {
        // Arrange
        $Id_Pasajero = '5';
        $nombre = 'John Doe';
        $Tipo_Documento = 'DNI';
        $numerodoc = '0801200112269';
        $telefono = '33607712';
        $correo = 'johndoe@example.com';
       
        $pais ='1';
        $fechaN = '01-01-2000';

        // Act
        $resultado = pasajeroAdd($Id_Pasajero,$nombre,$Tipo_Documento, $numerodoc, $telefono, $correo,$pais, $fechaN);

        // Assert
        $this->assertTrue($resultado);
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

  
}



?>