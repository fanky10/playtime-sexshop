<?php
session_start();
//$d = (int) $_GET["destroy"];
//if($d==1){
//    session_unset();
//}
/**
 * este es el manejador del carrin!
 * basicamente va a haceptar tres parametros:
 * action [add | update | remove | empty]
 * id_producto (que se le hace la action)
 * cant (on update)
 */
class ShoppingCart{
    //arreglo de items
    private $arrItems;
    //para llevar la cuenta de cuantos items hay en carro :)
    private $intItemsNum;
    public function __construct() {
        $this->arrItems;//=Array();
        $this->intItemsNum=0;
    }
    /*
     * agrego un nuevo id al arreglo
     * no sin antes fijarme si ya esta en el arreglo y sumarle la cantidad
     */
    function addItem($id_item,$cant){
//        echo "adding item: $id_item, $cant";
        $arrLenght = count($this->arrItems);
        //todo re cabeza
//        echo "count $arrLenght";
//        $this->arrItems[$arrLenght]['id']=$id_item;
//        $this->arrItems[$arrLenght]['cant']=$cant;
//        print_r($this->arrItems);
//        echo "after add: ".count($this->arrItems);
        //ahora me fijo si el producto ya existe e incremento su cant x)
        $found =0;//false
        for($index=0;$index < $arrLenght;$index++){
            $item = $this->arrItems[$index];
            $current_id = $item['id'];
            $current_cant = $item['cant'];
            if($current_id == $id_item){
                $found = 1;
                $this->arrItems[$index]['cant']=$current_cant + $cant;
                echo 'cant updated!';
            }
        }
        //echo "this".$this->intItemsNum;// = $arrLenght;

//        $this->intItemsNum++;
//        $prod_idx=$prod_idx+1;
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
}

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('cart')){//si no esta registrado lo registramos
    echo "registrando...";
    echo "<br>\n";
    $oCart = new ShoppingCart();
    $cart = serialize($oCart);
    $_SESSION['cart'] = $cart;
}
$action = $_GET["action"];
if($action=="clear"){
    session_unset();
}else if($action=="add"){
    $id_prod = (int)$_GET["prod_id"];
    $cant = (int)$_GET["qty"];
    $s = $_SESSION['cart'];
    //lo transformamos en objeto
    $oCart = unserialize($s);
    $oCart->addItem($id_prod,$cant);
    //ahora en bytes y lo subimos x)
    $cart = serialize($oCart);
    $_SESSION['cart'] = $cart;
    echo "added!";
}else if($action=="show"){
    $s = $_SESSION['cart'];
    $aCart = unserialize($s);
    $aCart->show();
//    echo "unserialized!: ".$aCart->getArray();
//    print_r($aCart->getArray());

}



?>
<html>
    <a href="?action=clear">clear me</a>
    <br>
    <a href="?action=add&prod_id=1&qty=10">add me</a>
    <br>
    <a href="?action=show">show me</a>
</html>