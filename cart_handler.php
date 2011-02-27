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

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('cart')){//si no esta registrado lo registramos
    $oCart = new ShoppingCart();
    $sCart = serialize($oCart);
    $_SESSION['cart'] = $sCart;
}
if(!isset ($action)){
    $action = $_GET["action"];
}
if($action=="clear"){
    session_unset();
    echo "cleared!<br>";
}else if($action=="add"){
    $id_prod = (int)$_POST["prod_id"];
    $cant = (int)$_POST["qty"];
    //validamos entradas
    if($id_prod<1){
        throw new Exception("Ivalid argument! id_prod > 0");
    }
    if($cant < 0){
        $cant = 1;//por default
    }
    //obtenemos el carrito
    $s = $_SESSION['cart'];
    //lo transformamos en objeto
    $oCart = unserialize($s);
    $oCart->addItem($id_prod,$cant);
    //ahora en bytes y lo sobreescribimos
    $sCart = serialize($oCart);
    $_SESSION['cart'] = $sCart;
    echo "added! <br>";
}else if($action=="upd"){
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
    $oCart->updItem($id_prod,$cant);
    //ahora en bytes y lo sobreescribimos
    $sCart = serialize($oCart);
    $_SESSION['cart'] = $sCart;
    echo "updated! <br>";
}else if($action=="show_status"){
    //obtenemos el carrito
    $s = $_SESSION['cart'];
    //lo transformamos en objeto
    $oCart = unserialize($s);
    $arrItems = $oCart->getItems();
    $arrLenght = count($arrItems);
    //linked to cart.php
    //formatted
    echo "<li id=\"cart\">\n
        <a href=\"cart.php\">Compra (<strong>$arrLenght</strong> Item".($arrLenght>1?"s":"").")</a>\n
        </li>";
    
}
else if($action=="show_list"){
    $s = $_SESSION['cart'];
    $oCart = unserialize($s);
    //lo mostramos un poquito mejor x)
//    $aCart->show();
    
    ?>
    <table border="1">
        <tr>
            <th>id_prod</th>
            <th>Nombre</th>
            <th>Precio Unitario</th>
            <th>cantidad</th>
            <th>Precio Total</th>
        </tr>
<?php
    //TODO: armar un array de ids y armar la parte de datos tmb
    //TODO: llamar a datos, pasarle el arreglo(de ids) y que me devuelva un array de productos
    //con sus respectivas cants
    //datos hardcoded
    $arrItems = $oCart->getItems();
    include_once 'datos/productos.php';
    //instancio datos
    $dProd = new DataProductos();
    //obtengo el arreglo corresp.
    $vProds = $dProd->getProductosCarrito($arrItems);
    $prod_found = count($vProds);
    for($index=0;$index < $prod_found;$index++){
        $oProducto = $vProds[$index];
        echo "<tr>";
        echo "<td>".$oProducto->getId_Producto()."</td>";
        echo "<td>".$oProducto->getNombre()."</td>";
        echo "<td>".$oProducto->getPrecio()."</td>";
        echo "<td>".$oProducto->getCantidad()."</td>";
        echo "<td>".$oProducto->getPrecio_Total()."</td>";
        echo "</tr>";
    }

//    $arrLenght = count($arrItems);
//    print_r( $arrItems);echo"<br>";
//    for($index=0;$index < $arrLenght;$index++){
//        $item = $arrItems[$index];
//        $current_id = $item['id'];
//        $current_cant = $item['cant'];
//        echo "<tr>";
//        echo "<td>".$current_id."</td>";
//        echo "<td>".$current_cant."</td>";
//        echo "<tr>";
//    }


?>
    </table>
    <br>
<?php
}

if(isset ($_GET["redirect"])){
    header( 'Location: '.$_GET["redirect"] ) ;
}
//seteado a mano para testeo :)
$test_opt=1;
if($test_opt==1){
?>
    <a href="?ontest=1&action=clear">clear me</a>
    <br>
    
    <!--
    <a href="?ontest=1&action=add&prod_id=1&qty=10">add me</a>
    -->
    <form action="cart_handler.php?action=add" method="POST" id="formProducto">
        <input type="hidden" name="prod_id" value="1"
        <div class="formField">
            <label>Precio:</label>
            <p class="prodPrecio">$ 99,00.-</p>
        </div>

        <div class="formField">
            <label>Cantidad:</label>
            <input id="cantidad" name="qty" class="inputData required number" maxlength="3" value="1"/>

        </div>
        <div class="formButton">
            <input id="comprar" class="formButton" type="submit" name="action" value="add" />
        </div>
    </form>

    <br>
    <a href="?ontest=1&action=show_list">show list to me</a>
    <br>
    <a href="?ontest=1&action=show_status">show status</a>
</html>
<?php
}
?>