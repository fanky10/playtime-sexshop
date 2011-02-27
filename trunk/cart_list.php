<?php

/**
 * este es el manejador del carrin!
 * basicamente va a haceptar tres parametros:
 * action [add | update | remove | empty]
 * id_producto (que se le hace la action)
 * cant (si no se especifica por fault es 1)
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
    echo "sin items cargados <br>";
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
        echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">";//si es par: colorcito lindo
        echo "<td>".$oProducto->getNombre()."</td>";
        echo "<td>IDK 111</td>";
        echo "<td>".$oProducto->getPrecio()."</td>";
        echo "<td>";
            echo "<input id=\"cartCantidad_$index\" name=\"cartCantidad\" class=\"inputData required\" value=\"".$oProducto->getCantidad()."\" />";
            echo "<a onclick=\"reloadListShoppingCart('del',".$oProducto->getId_Producto().");\" title=\"Delete\" class=\"tableIcon icn-delete\"></a>";
            echo "<a onclick=\"reloadListShoppingCart('upd',".$oProducto->getId_Producto().",'cartCantidad_$index');\" title=\"Update\" class=\"tableIcon icn-update\"></a>";
        echo "</td>";
//        echo "<td>".$oProducto->getCantidad()."</td>";
        echo "<td>".$oProducto->getPrecio_Total()."</td>";
        echo "</tr>";
    }
    //odio errores en el codigo x mas que sepa que no hay errores x)
    ?>
    </table>
    <?php
    //echo "</table>";
}
?>
</div>