<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of roll
 *
 * @author facundo
 */
class Roll {
    //put your code here
    private $id;
    private $descripcion;
    public static $_USER_ADMIN = "admin";
    public static $_USER_REGULAR = "regular";
    public function __construct() {
        
    }
    //<editor-fold desc="get-setters">
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    //</editor-fold>

    
}

?>
