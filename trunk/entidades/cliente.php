<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author fanky
 */
class Cliente {
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $direccion;
    private $ciudad;
    private $codigo_postal;
    private $zona_envio; //int el id de zona

    public function __construct() {
        
    }
    //
    //SETTERS
    //
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setApellido($apellido){
        $this->apellido = $apellido;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }
    function setCodigoPostal($codigo_postal){
        $this->codigo_postal = $codigo_postal;
    }
    function setZonaEnvio($zona_envio){
        $this->zona_envio = $zona_envio;
    }
    //
    //GETTERS
    //
    function getNombre(){
        return $this->nombre;
    }
    function getApellido(){
        return $this->apellido;
    }
    function getEmail(){
        return $this->email;
    }
    function getTelefono(){
        return $this->telefono;
    }
    function getDireccion(){
        return $this->direccion;
    }
    function getCiudad(){
        return $this->ciudad;
    }
    function getCodigoPostal(){
        return $this->codigo_postal;
    }
    function getZonaEnvio(){
        return $this->zona_envio;
    }
}

?>
