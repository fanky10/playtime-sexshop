<?php

/**
 * este script solo muestra una tabla well formed de los datos contenidos en SESSION
 * sobre el carrito de compras
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
<div id="result">
<table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
    <tr>
        <th>Detalle</th>
        <th>SKU</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
    </tr>
<?php
    //dos acciones: actualizar y delete
    include_once 'datos/productos.php';
    include_once 'util/utilidades.php';
    //datos new instance
    $dProd = new DataProductos();
    //obtengo el arreglo corresp.
    $vProds = $dProd->getProductosCarrito($arrItems);
    $prod_found = count($vProds);
    //itero y muestro :)
    for($index=0;$index < $prod_found;$index++){
        $oProducto = $vProds[$index];
        echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">";//si es par: colorcito lindo
        echo "<td>".$oProducto->getNombre()."</td>";
        echo "<td>IDK 111</td>";
        echo "<td> $ ".Utilidades::formatero_numero($oProducto->getPrecio())."</td>";
        echo "<td>";
            echo "<input id=\"cartCantidad_$index\" name=\"cartCantidad\" class=\"inputData required\" value=\"".$oProducto->getCantidad()."\" size=\"10\"/>";
            echo "<a onclick=\"reloadListShoppingCart('del',".$oProducto->getId_Producto().");\" title=\"Borrar Producto\" alt=\"Borrar Producto\" class=\"tableIcon icn-delete\"></a>";
            echo "<a onclick=\"reloadListShoppingCart('upd',".$oProducto->getId_Producto().",'cartCantidad_$index');\" title=\"Actualizar Cantidad\" alt=\"Actualizar Cantidad\" class=\"tableIcon icn-update\"></a>";
        echo "</td>";
//        echo "<td>".$oProducto->getCantidad()."</td>";
        echo "<td> $ ".Utilidades::formatero_numero($oProducto->getPrecio_Total())."</td>";
        echo "</tr>";
    }
    //odio errores en el codigo x mas que sepa que no hay errores x)
    ?>
    </table>
    <a href="checkout01.php" class="formButton">checkout</a>
    <!--
    <div class="formButton">
        <input id="formCheckout" class="formButton" type="submit" name="formCheckout" value="checkout" />
    </div>
    -->
    <?php
    //echo "</table>";
}
?>
</div>