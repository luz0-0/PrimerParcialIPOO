<?php

/* El método constructor de la clase Persona, 
debe recibir como parámetros todos 
los valores iniciales para los atributos definidos en la clase. */

class Persona {
    private string $nombre;
    private string $apellido;
    private string $direccion;
    private string $mail;
    private int $telefono;

    public function __construct($nombre, $apellido, $direccion, $mail, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
    }

    
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function __toString() {
        return 
        "\nINFORMACION PERSONA: ".
        "\n -> Nombre: ".$this->getNombre().
         "\n -> Apellido: ".$this->getApellido().
        "\n -> Dirección: ".$this->getDireccion().
        "\n -> Mail: ".$this->getMail().
        "\n -> Teléfono: ".$this->getTelefono();
    }

}