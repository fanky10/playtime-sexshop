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
                break;//ya fue no importa mas nada
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
            if($current_id == $id_item){
                $found = 1;
                $this->arrItems[$index]['cant'] = $cant;
                break;//ya fue no importa mas nada
            }
        }
        //si no lo encontramos (??) lo agregamos x)
        if($found!=1){
            $this->arrItems[$arrLenght]['id']=$id_item;
            $this->arrItems[$arrLenght]['cant']=$cant;
        }
    }
    function delItem($id_item){
        $arrLenght = count($this->arrItems);
        //ahora me fijo si el producto ya existe y hago upd
        $found =0;//false
        $indx_del=-1;
        for($index=0;$index < $arrLenght;$index++){
            $item = $this->arrItems[$index];
            $current_id = $item['id'];
            if($current_id == $id_item){
                $indx_del = $index;
                break;//ya fue no importa mas nada
            }
        }
        //si no lo encontramos ya fue x)
        if(!($indx_del<0)){
            unset ($this->arrItems[$indx_del]);
            //array_merge($this->arrItems);//reordena el arreglin
            $this->arrItems = array_values($this->arrItems);
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
