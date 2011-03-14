<?php

/**
 * este es el manejador del carrin!
 * basicamente va a haceptar tres parametros:
 * action [add | update | remove | empty]
 * id_producto (que se le hace la action)
 * cant (si no se especifica por fault es 1)
 */
//suppression operator @ for errors XD
@session_start();
include_once 'entidades/shoppingcart.php';

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
    session_unregister('cart');
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
    //TODO: VERIFICAR QUE EXISTA EN DB
    //obtenemos el carrito
    $s = $_SESSION['cart'];
    //lo transformamos en objeto
    $oCart = unserialize($s);
    $oCart->addItem($id_prod,$cant);
    //ahora en bytes y lo sobreescribimos
    $sCart = serialize($oCart);
    $_SESSION['cart'] = $sCart;
    echo "added! <br>";
}else if($action=="del"){//se usa un link
    $id_prod = (int)$_GET["prod_id"];
    //validamos entrada
    if($id_prod<1){
        throw new Exception("Ivalid argument! id_prod > 0");
    }
    //obtenemos el carrito
    $s = $_SESSION['cart'];
    //lo transformamos en objeto
    $oCart = unserialize($s);
    //descontamos el item
    $oCart->delItem($id_prod);
    //ahora en bytes y lo sobreescribimos
    $sCart = serialize($oCart);
    $_SESSION['cart'] = $sCart;
//    echo "deleted! <br>";
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
//    echo "updated! <br>";
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
        <a href=\"#\">Compra (<strong>$arrLenght</strong> Item".($arrLenght>1?"s":"").")</a>\n
        </li>";
}
else if($action=="show_list"){
    include 'cart_list.php';

}

if(isset ($_GET["redirect"])){
    include_once $_GET["redirect"];
    //header( 'Location: '.$_GET["redirect"] ) ;
}
//seteado a mano para testeo :)
$test_opt=0;
if($test_opt==1){
?>

<!--Agregar - eliminar - modificar prods-->
    <form action="cart_handler.php?action=add" method="POST" id="formProducto">
        <div class="formField">
            <label>IdProducto</label>
            <input id="cantidad" name="prod_id" class="inputData required number" maxlength="3" value="1"/>

        </div>
        
        <div class="formField">
            <label>Cantidad:</label>
            <input id="cantidad" name="qty" class="inputData required number" maxlength="3" value="1"/>

        </div>
        <div class="formButton">
            <input id="comprar" class="formButton" type="submit" name="action" value="add" />
        </div>
    </form>


    <form action="cart_handler.php" method="GET" id="formProducto">
        <div class="formField">
            <label>IdProducto</label>
            <input id="cantidad" name="prod_id" class="inputData required number" maxlength="3" value="1"/>

        </div>
        <div class="formButton">
            <input id="comprar" class="formButton" type="submit" name="action" value="del" />
        </div>

    </form>
    <form action="cart_handler.php" method="GET" id="formProducto">
        <div class="formField">
            <label>IdProducto</label>
            <input id="cantidad" name="prod_id" class="inputData required number" maxlength="3" value="1"/>
            <label>Cantidad</label>
            <input id="cantidad" name="qty" class="inputData required number" maxlength="3" value="1"/>
        </div>
        <div class="formButton">
            <input id="comprar" class="formButton" type="submit" name="action" value="upd" />
        </div>
    </form>
    <br>
    <a href="?action=show_list">show list to me</a>
    <br>
    <a href="?action=show_status">show status</a>
    <br>
    <a href="?action=clear">clear me</a>

</html>
<?php
}
?>