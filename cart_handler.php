<?php

/**
 * este es el manejador del carrin!
 * basicamente va a haceptar tres parametros:
 * action [add | update | remove | empty]
 * id_producto (que se le hace la action)
 * cant (si no se especifica por fault es 1)
 */
session_start();
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
                echo 'cant updated!';
            }
        }
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

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('cart')){//si no esta registrado lo registramos
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
    //validamos entradas
    if($id_prod<0){
        return;
    }
    if($cant < 0){
        $cant = 0;
    }
    //obtenemos el carrito
    $s = $_SESSION['cart'];
    //lo transformamos en objeto
    $oCart = unserialize($s);
    $oCart->addItem($id_prod,$cant);
    //ahora en bytes y lo sobreescribimos
    $cart = serialize($oCart);
    $_SESSION['cart'] = $cart;
    echo "added!";
}else if($action=="show"){
    $s = $_SESSION['cart'];
    $aCart = unserialize($s);
    //lo mostramos un poquito mejor x)
//    $aCart->show();
    
    ?>
    <table border="1">
        <tr>
            <th>id_prod</th>
            <th>cantidad</th>
        </tr>
<?php
    //llamar a datos, pasarle el arreglo(de ids) y que me devuelva un array de productos
    //con respectivas sus cants
    $arrItems = $aCart->getItems();
    $arrLenght = count($arrItems);

    for($index=0;$index < $arrLenght;$index++){
        $item = $arrItems[$index];
        $current_id = $item['id'];
        $current_cant = $item['cant'];
        echo "<tr>";
        echo "<td>".$current_id."</td>";
        echo "<td>".$current_cant."</td>";
        echo "<tr>";
    }

}
?>
    </table>
<?php


?>
<html>
    <br>
    <a href="?action=clear">clear me</a>
    <br>
    <a href="?action=add&prod_id=1&qty=10">add me</a>
    <br>
    <a href="?action=show">show me</a>
</html>