<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shoppingcart
 *
 * @author fanky
 */
class ShoppingCart{
    //arreglo de items
    private $arrItems;
    public function __construct() {
        $this->arrItems=Array();
    }
    /*
     * agrego un nuevo id al arreglo
     * no sin antes fijarme si ya esta en el arreglo y sumarle la cantidad
     */
    function addItem($id_item,$cant){
        $arrLenght = count($this->arrItems);
        //ahora me fijo si el producto ya existe e incremento su cant
        $found =0;//false
        for($index=0;$index < $arrLenght;$index++){
            $item = $this->arrItems[$index];
            $current_id = $item['id'];
            $current_cant = $item['cant'];
            if($current_id == $id_item){
                $found = 1;
                $this->arrItems[$index]['cant']=$current_cant + $cant;
            }
        }
        if($found!=1){
            $this->arrItems[$arrLenght]['id']=$id_item;
            $this->arrItems[$arrLenght]['cant']=$cant;
        }
    }
    function updItem($id_item,$cant){
        $arrLenght = count($this->arrItems);
        //ahora me fijo si el producto ya existe y hago upd
        $found =0;//false
        for($index=0;$index < $arrLenght;$index++){
            $item = $this->arrItems[$index];
            $current_id = $item['id'];
            $current_cant = $item['cant'];
            if($current_id == $id_item){
                $found = 1;
                $this->arrItems[$index]['cant']= $cant;
            }
        }
        //si no lo encontramos (??) lo agregamos x)
        if($found!=1){
            $this->arrItems[$arrLenght]['id']=$id_item;
            $this->arrItems[$arrLenght]['cant']=$cant;
        }
    }
    function show(){
        $arrLenght = count($this->arrItems);
        echo "found: $arrLenght <br>";
        print_r($this->arrItems);
    }
    function getItems(){
        return $this->arrItems;
    }
}
?>
