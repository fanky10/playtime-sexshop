<?php

/**
 * este script solo muestra una tabla well formed de los datos contenidos en SESSION
 * sobre el carrito de compras
 * para la confirmacion de datos
 */
session_start();
include_once 'entidades/shoppingcart.php';
include_once 'entidades/cliente.php';

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('cart')){//si no esta registrado lo registramos
    $oCart = new ShoppingCart();
    $sCart = serialize($oCart);
    $_SESSION['cart'] = $sCart;
}

if(!session_is_registered('client')){
    $oClient = new Cliente();
    $sClient = serialize($oClient);
    $_SESSION['client'] = $sClient;
}
$s = $_SESSION['cart'];
$oCart = unserialize($s);


$s = $_SESSION['client'];
$oClient = unserialize($s);

$arrItems = $oCart->getItems();
if(count($arrItems)<1){
    echo "<h3> No tiene items agregados.</h3>";
}else{
?>

<table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
    <tr>
        <th class="line-left">Detalle</th>
        <th class="line-left cartSKU">SKU</th>
        <th class="line-left cartPrecio">Precio</th>
        <th class="line-left cartCantidad">Cantidad</th>
        <th class="line-left cartSubtotal">Total</th>
    </tr>
<?php
    include_once 'datos/productos.php';
    include_once 'util/utilidades.php';
    include_once 'datos/zonas.php';
    include_once 'conf/conf.php';
    $dZonas = new DataZonas();
    $id_zona = (int) $oClient->getZonaEnvio();
    $vZonas = $dZonas->getZonas($id_zona);
    if(count($vZonas)<1){
        $empaque = -1.0;
    }else{
        $oZona = $vZonas[0];
        $empaque = $oZona->getPrecio();
    }
    //datos new instance
    $dProd = new DataProductos();
    //obtengo el arreglo corresp.
    $vProds = $dProd->getProductosCarrito($arrItems);
    $prod_found = count($vProds);
    //itero y muestro :)
    $index=0;
    $subtotal=0;
    $iva =0;
//    $empaque = 11.11;//TODO buscar en db el objeto Zona
    for(;$index < $prod_found;){
        $oProducto = $vProds[$index];
        echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">";//si es par: colorcito lindo
        echo "<td>".$oProducto->getNombre()."</td>";
        echo "<td>IDK 111</td>";
        echo "<td> $ ".Utilidades::formatero_numero($oProducto->getPrecio())."</td>";
        echo "<td>".$oProducto->getCantidad()."</td>";
        echo "<td> $ ".Utilidades::formatero_numero($oProducto->getPrecio_Total())."</td>";
        echo "</tr>";
        $index++;
        $subtotal = $subtotal +$oProducto->getPrecio_Total();
    }
    $iva = $subtotal * Configuracion::$CONFIGURACION_IVA;//TODO: Constante de configuracion.. por si el dia de mañana CAMBIA
    $total = $subtotal + $iva + $empaque;
    //subtotal
    echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">
            <td colspan=\"4\" class=\"cartTotal\">Subtotal</td>
            <td> $ ".Utilidades::formatero_numero($subtotal)." </td>
        </tr>\n";
    $index++;
    //IVA
    echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">
            <td colspan=\"4\" class=\"cartTotal\">IVA</td>
            <td> $ ".Utilidades::formatero_numero($iva)." </td>
        </tr>\n";
    $index++;
    //Manejo y Empaque xD (por codigo de zona)
    echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">
            <td colspan=\"4\" class=\"cartTotal\">Manejo y empaque</td>
            <td> $ ".Utilidades::formatero_numero($empaque)." </td>
        </tr>\n";
    $index++;
    //total
    echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">
            <td colspan=\"4\" class=\"cartTotal\">Total</td>
            <td> $ ".Utilidades::formatero_numero($total)." </td>
        </tr>\n";
    ?>
</table>
<?php
}
?>