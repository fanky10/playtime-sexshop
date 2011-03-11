<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of zona
 *
 * @author fanky
 */
class Zona {
    private $id;
    private $nombre;
    private $precio;
    public function __construct() {
        $this->id=0;
        $this->nombre="";
        $this->precio=0.0;
    }
    //
    //getters
    //
    function getId(){
        return $this->id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getPrecio(){
        return $this->precio;
    }
    //
    //Setters
    //
    function setId($id){
        $this->id=$id;
    }
    function setNombre($nombre){
        $this->nombre=$nombre;
    }
    function setPrecio($precio){
        $this->precio=$precio;
    }
}
?>
