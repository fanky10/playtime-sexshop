<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author facundo
 */
class Usuario {
    private $id;
    private $nombre;
    private $password;
    private $roll;//por ahora un usuario puede tener un roll
    
    public function __construct() {
        
    }
    
    //<editor-fold desc="get-setters">
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRoll() {
        return $this->roll;
    }

    public function setRoll($roll) {
        $this->roll = $roll;
    }
    //</editor-fold>
}

?>
