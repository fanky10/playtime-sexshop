<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Marca{
    private $id_marca;
    private $nombre;
    function setId_Marca($_id_marca){
        $this->id_marca=$id_marca;
    }
    function setNombre($_nombre){
        $this->nombre=$_nombre;
    }
    
    function getId_Marca(){
        return $this->id_marca;
    }
    function getNombre(){
        return $this->nombre;
    }
}
?>
