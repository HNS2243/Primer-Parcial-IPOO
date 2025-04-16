<?php
class Persona {
    private string $nombre;
    private string $apellido;
    private string $direccion;
    private string $email;
    private string $telefono;

    // Constructor
    public function __construct(string $pnombre, string $papellido, string $pdireccion, string $mail, string $telefono) {
        $this->setNombre($pnombre);
        $this->setApellido($papellido);
        $this->setDireccion($pdireccion);     
        $this->setEmail($mail);
        $this->setTelefono($telefono);
    }
        // Métodos setter
    public function setNombre($pnombre){
        $this->nombre = $pnombre;
    }
    public function setApellido($papellido){
        $this->apellido = $papellido;
    }
    public function setDireccion($pdireccion){
        $this->direccion = $pdireccion;
    }
    public function setEmail($mail){
        $this->email = $mail;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    // Métodos getter
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    // Método toString
    public function __toString() {
        return "Los datos de la persona son: \n Nombre: " . $this->getNombre . "\n Apellido: " . $this->getApellido .
         "\n Direccion: " . $this->getDireccion . "\n Email :" . $this->getEmail . "\n Telefono:" . $this->getTelefono;
    }
}