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
    <dl class="checkoutConfirmData">
        <dt>Datos Cliente:</dt>
        <dd>
            <span><?php echo $oClient->getNombre()?></span>
            <span><?php echo $oClient->getApellido()?></span>
        </dd>
        <dt>Contacto:</dt>
        <dd>
            <span>Email: <?php echo $oClient->getEmail()?></span>
            <span> - Telefono: <?php echo $oClient->getTelefono()?></span>
        </dd>
        <dt>Direcci&oacute;n:</dt>
        <dd>
            <span><?php echo $oClient->getDireccion()?></span>
            (<span><?php echo $oClient->getCodigoPostal()?></span>)
            <span><?php echo $oClient->getCiudad()?></span>
        </dd>
    </dl>
</div>
