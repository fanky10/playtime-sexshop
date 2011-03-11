<?php
    @session_start();
    include_once 'entidades/shoppingcart.php';
    include_once 'entidades/cliente.php';
    include_once 'datos/zonas.php';
    include_once 'util/utilidades.php';
    //datos del cart
    //si la encontramos sin nada la creamos al toke
    if(!session_is_registered('cart')){//si no esta registrado lo registramos
        $oCart = new ShoppingCart();
        $sCart = serialize($oCart);
        $_SESSION['cart'] = $sCart;
    }
    //datos del cliente
    if(!session_is_registered('client')){
        $oClient = new Cliente();
        $sClient = serialize($oClient);
        $_SESSION['client'] = $sClient;
    }
    $s = $_SESSION['cart'];
    $oCart = unserialize($s);


    $s = $_SESSION['client'];
    $oClient = unserialize($s);
    //zonas
    $dZonas = new DataZonas();
    $id_zona = (int) $oClient->getZonaEnvio();
    $vZonas = $dZonas->getZonas($id_zona);
    if(count($vZonas)<1){
        $zona= "desconocida";
        $empaque = 0.0;
    }else{
        $oZona = $vZonas[0];
        $zona = $oZona->getNombre();
        $empaque = $oZona->getPrecio();
    }
    //POST: COMENTARIO
    $comment = $_POST["comentario"];
?>
<div id="factura">
    <div class="facturaHeader">
            <img src="images/logo-factura.png" alt="Play Time Sex Shop" />
            <h4>Play Time Sex Shop</h4>
            <p class="contactInfo">
            <span class="contactTel">(011) - 156777777</span>
            <span class="contactMSN">ventas@playtimesexshop.coms</span>
            <span class="contactMail">info@playtimesexshop.com</span>
    </p>
    </div>
    <!--esto no se toka por falta de datos-->
    <div class="confirmationInfo">
                        <h3>Informaci&oacute;n del pedido</h3>
                        <dl class="checkoutConfirmData">
                            <dt>Nro. de Orden:</dt>
                            <dd><span>023499623498586</span></dd>

                            <dt>Fecha:</dt>
                            <dd><span>Sabado 29 de diciembre, 2010</span></dd>

                            <dt>Estado:</dt>
                            <dd><span>Pendiente</span></dd>
                        </dl>
                    </div>

    <div class="confirmationInfo">
    <!-- fin esto no se toka por falta de datos-->

    <h3>Informaci&oacute;n de cobro y env&iacute;o</h3>
    <dl class="checkoutConfirmData">

        <dt>E-mail:</dt>
        <dd><span><?php echo $oClient->getEmail();?></span></dd>

        <dt>Nombre:</dt>
        <dd><span><?php echo $oClient->getNombre();?></span></dd>

        <dt>Apellido:</dt>
        <dd><span><?php echo $oClient->getApellido();?></span></dd>

        <dt>Direcci&oacute;n:</dt>
        <dd><span><?php echo $oClient->getDireccion();?></span></dd>

        <dt>C&oacute;digo Postal:</dt>
        <dd><span><?php echo $oClient->getCodigoPostal();?></span></dd>

        <dt>Ciudad:</dt>
        <dd><span><?php echo $oClient->getCiudad();?></span></dd>
        <!-- no existe en el formulario checkout01.php -> se supone que se manejara por zonas
        <dt>Provincia:</dt>
        <dd><span>Santa Fe</span></dd>
        -->
        <dt>Zona:</dt>
        <dd><span><?php echo $zona;?></span></dd>
        <dt>Tel&eacute;fono:</dt>
        <dd><span><?php echo $oClient->getTelefono();?></span></dd>
    </dl>

        <hr />
        <!--chequear que onda esto... por ahora le tiro nombre zona y precio-->

        <dl class="checkoutConfirmData">
            <dt>Empresa:</dt>
            <dd><span>Correo Argentino</span></dd>

            <dt>M&eacute;todo:</dt>
            <dd><span>Env&iacute;o contrareembolso</span></dd>

            <dt>Costo del envi&iacute;o:</dt>
            <dd><span>$ <?php echo Utilidades::formatero_numero($empaque);?></span></dd>
        </dl>
    </div>
    <!--chequear que onda esto...-->
    <div class="confirmationInfo">
        <h3>Informaci&oacute;n de pago</h3>
        <dl class="checkoutConfirmData">
            <dt>M&eacute;todo de pago:</dt>
            <dd><span>Pago contrareembolso en la direcci&oacute;n otorgada</span></dd>
        </dl>
    </div>
    <?php
        include 'cart_mail.php';//'cart_list_confirm.php';
    ?>
    <!--
    <table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
                <tr>
                    <th class="line-left">Detalle</th>
                    <th class="line-left cartSKU">SKU</th>
                    <th class="line-left cartPrecio">Precio</th>
                    <th class="line-left cartCantidad">Cantidad</th>
                    <th class="line-left cartSubtotal">Total</th>
                </tr>
                <tr>
                    <td>Pito de goma</td>
                    <td>096RT</td>
                    <td>$ 158.45</td>
                    <td>1</td>
                    <td>$ 158.45</td>
                </tr>
                <tr class="alternate-row">
                    <td>Pito de goma</td>
                    <td>096RT</td>
                    <td>$ 158.45</td>
                    <td>1</td>
                    <td>$ 158.45</td>
                </tr>
                <tr>
                    <td colspan="4" class="cartTotal">Subtotal</td>
                    <td>$ 158.45</td>
                </tr>
                <tr class="alternate-row">
                    <td colspan="4" class="cartTotal">Manejo y empaque</td>
                    <td>$ 15.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="cartTotal">IVA</td>
                    <td>$ 15.80</td>
                </tr>
                <tr class="alternate-row">
                    <td colspan="4" class="cartTotal"><strong>Total</strong></td>
                    <td><strong>$ 999.00</strong></td>
                </tr>
    </table>
    -->

                    <div class="confirmationInfo">
                        <h3>Comentarios adicionales</h3>
                        <dl class="checkoutConfirmData">
                            <dt>Su comentario:</dt>
                            <dd><span><?php echo $comment;?></span></dd>
                        </dl>
                    </div>

</div>
