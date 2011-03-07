<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Producto{
    private $id_producto;
    private $nombre;
    private $descripcion;
    private $informacion;
    private $marca;
    private $categorias;
    private $imagen;
    private $precio;
    private $precio_total;
    private $cantidad;
    
    function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    function setPrecio_Total($precio_total){
        $this->precio_total = $precio_total;
    }
    function setId_Producto($_id_producto){
        $this->id_producto=$_id_producto;
    }
    function setNombre($_nombre){
        $this->nombre=$_nombre;
    }
    function setDescripcion($_descripcion){
        $this->descripcion=$_descripcion;
    }
    function setInformacion($_informacion){
        $this->informacion=$_informacion;
    }
    function setMarca($_marca){
        $this->marca=$_marca;
    }
    function setCategorias($_categorias){
        $this->categorias=$_categorias;
    }
    function setImagen($_imagen){
        $this->imagen=$_imagen;
    }
    function setPrecio($_precio){
        $this->precio=$_precio;
    }


    function getId_Producto(){
        return $this->id_producto;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getDescription(){
        return $this->descripcion;
    }
    function getInformacion(){
        return $this->informacion;
    }
    function getMarca(){
        return $this->marca;
    }
    function getCategorias(){
        return $this->categorias;
    }
    function getImagen(){
        return $this->imagen;
    }
    function getPrecio(){
        return $this->precio;
    }
    function getPrecio_Total(){
        //ahora se usa una utilidad externa para mostrar bien los numeros
        $this->precio_total = $this->cantidad * $this->precio;
//        $formato_numero = number_format($this->precio_total, 2, ',', '.');
//        return $formato_numero;
        return $this->precio_total;
        
    }
    function getCantidad(){
        return $this->cantidad;
    }
}
?>
