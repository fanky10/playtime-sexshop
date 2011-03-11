<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Categoria{
    private $id_categoria;
    private $nombre;
    function setId_Categoria($_id_categoria) {
        $this->id_categoria=$_id_categoria;
    }
    function setNombre($_nombre){
        $this->nombre=$_nombre;
    }
    function getId_Categoria(){
        return $this->id_categoria;
    }
    function getNombre(){
        return $this->nombre;
    }
}
?>
