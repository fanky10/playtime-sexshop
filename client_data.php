<?php
/**
 * muestra los datos para el checkout02.php
 */

@session_start();
include_once 'entidades/cliente.php';

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('client')){//si no esta registrado lo registramos
    echo "client unreg!";
    $oClient = new Cliente();
    $sClient = serialize($oClient);
    $_SESSION['client'] = $sClient;
}
$s = $_SESSION['client'];
$oClient = unserialize($s);
?>
<div class="confirmationInfo">
    <h3>Por favor revise la informaci&oacute;n de envio y confirme la orden:</h3>
    <dl class="checkoutConfirmData">
            <dt>Direcci&oacute;n:</dt>
            <dd>
                <span><?php echo $oClient->getDireccion()?></span>
                (<span><?php echo $oClient->getCodigoPostal()?></span>)
                <span><?php echo $oClient->getCiudad()?></span>
            </dd>

            <dt>Metodo de env&iacute;o:</dt>
            <dd><span>Correo argentina, contrareembolso</span></dd>

            <dt>Otro dato:</dt>
            <dd><span>Lorem ipsum dolor sit amet</span></dd>
    </dl>

    <div class="formField">
        <label>Si lo desea puede dejar un comentario junto con su orden de compra:</label>
        <textarea id="comentario" name="comentario" class="required"></textarea>
    </div>
</div>
<!--
<div class="confirmationInfo">
    <h3>Por favor revise la informaci&oacute;n de envio y confirme la orden:</h3>
    <dl class="checkoutConfirmData">
            <dt>Direcci&oacute;n:</dt>
            <dd><span>Lavalle 2617</span> (<span>2452</span>) <span>San Jorge</span></dd>

            <dt>Metodo de env&iacute;o:</dt>
            <dd><span>Correo argentina, contrareembolso</span></dd>

            <dt>Otro dato:</dt>
            <dd><span>Lorem ipsum dolor sit amet</span></dd>
    </dl>

    <div class="formField">
        <label>Si lo desea puede dejar un comentario junto con su orden de compra:</label>
        <textarea id="comentario" name="comentario" class="required"></textarea>
    </div>
</div>
-->