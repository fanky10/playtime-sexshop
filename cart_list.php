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
if(count($arrItems)<1){
    echo "sin items cargados <br>";
}else{
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
    <tr>
        <th>Detalle</th>
        <th>SKU</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
    </tr>
<?php

    include_once 'datos/productos.php';
    //datos new instance
    $dProd = new DataProductos();
    //obtengo el arreglo corresp.
    $vProds = $dProd->getProductosCarrito($arrItems);
    $prod_found = count($vProds);
    //itero y muestro :)
    for($index=0;$index < $prod_found;$index++){
        $oProducto = $vProds[$index];
        /**
         * Change '10' to be any number you want
         * <?=(10&1) ? "odd" : "even"?>
         */
        echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">";//si es par: colorcito lindo
        echo "<td>".$oProducto->getNombre()."</td>";
        echo "<td>IDK 111</td>";
        echo "<td>".$oProducto->getPrecio()."</td>";
        echo "<td>
                <input id=\"cartCantidad\" name=\"cartCantidad\" class=\"inputData required\" value=\"".$oProducto->getCantidad()."\" />
                <a href=\"\" title=\"Delete\" class=\"tableIcon icn-delete\"></a>
                <a href=\"\" title=\"Update\" class=\"tableIcon icn-update\"></a>
        </td>";
//        echo "<td>".$oProducto->getCantidad()."</td>";
        echo "<td>".$oProducto->getPrecio_Total()."</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}