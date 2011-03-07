<?php
/**
 * este es el manejador del cliente! aqui se setea un cliente
 * para luego usarlo con distintos fines
 */
session_start();
include_once 'entidades/cliente.php';

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('client')){//si no esta registrado lo registramos
    
    $oClient = new Cliente();
    $sClient = serialize($oClient);
    $_SESSION['client'] = $sClient;
}
if(!isset ($action)){
    $action = $_GET["action"];
}
if($action=="add"){//espero por post todos los datos necesarios
    $nombre = $_POST["formCheckoutNombre"];
    $apellido = $_POST["formCheckoutApellido"];
    $email = $_POST["formCheckoutMail"];
    $telefono = $_POST["formCheckoutTel"];
    $direccion = $_POST["formCheckoutDireccion"];
    $ciudad = $_POST["formCheckoutCiudad"];
    $codigo_postal = $_POST["formCheckoutPostal"];
    $zona_envio = (int) $_POST["formCheckoutSelect"];
    //validamos entradas
    if($zona_envio<1){
        throw new Exception("Ivalid argument! zona_envio > 0 is needed");
    }
    //obtenemos el cliente
    $s = $_SESSION['client'];
    //lo transformamos en objeto
    $oClient = unserialize($s);
    //lo seteamos
    $oClient->setApellido($apellido);
    $oClient->setCiudad($ciudad);
    $oClient->setCodigoPostal($codigo_postal);
    $oClient->setDireccion($direccion);
    $oClient->setEmail($email);
    $oClient->setNombre($nombre);
    $oClient->setTelefono($telefono);
    $oClient->setZonaEnvio($zona_envio);
    //ahora en bytes y lo sobreescribimos
    $sClient = serialize($oClient);
    $_SESSION['client'] = $sClient;
}else if($action=="show_data"){
    include 'client_data.php';

}
//si es necesario redireccionar:

if(isset ($_GET["redirect"])){
    header( 'Location: '.$_GET["redirect"] ) ;
}
?>