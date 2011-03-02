<?php

/**
 * este es el que muestra una preview de lo que viene comprando...
 */
session_start();
include_once 'entidades/shoppingcart.php';

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('cart')){//si no esta registrado lo registramos
    $oCart = new ShoppingCart();
    $sCart = serialize($oCart);
    $_SESSION['cart'] = $sCart;
}

$s = $_SESSION['cart'];
$oCart = unserialize($s);
//lo mostramos un poquito mejor x)
//    $aCart->show();
$arrItems = $oCart->getItems();
//print_r($arrItems);
//echo "<br>";
if(count($arrItems)<1){
    echo "<h3> No tiene items agregados.</h3>";
}else{
?>
<table>
    
<?php
    //dos acciones: actualizar y delete
    //podemos hacerlo: llamando a: ajax-> cart_list.php?redirect...
    include_once 'datos/productos.php';
    //datos new instance
    $dProd = new DataProductos();
    //obtengo el arreglo corresp.
    $vProds = $dProd->getProductosCarrito($arrItems);
    $prod_found = count($vProds);
    //itero y muestro :)
    for($index=0;$index < $prod_found;$index++){
        $oProducto = $vProds[$index];
        echo "<tr>\n";
        echo "<td class=\"cartOvervireCantidad\">".$oProducto->getCantidad()."</td>\n";
        echo "<td class=\"cartOverviewDetail\"><a href=\"producto.php?id_prod=".$oProducto->getId_Producto()."\">".$oProducto->getNombre()."</a></td>";
        echo "<td class=\"cartOverviewPrice\">$ ".$oProducto->getPrecio_Total()."</td>";
        echo "</tr>\n";
    }
    ?>
    </table>
    <a href="cart.php" class="linkButton">checkout</a>
    <?php
    //echo "</table>";
}
?>