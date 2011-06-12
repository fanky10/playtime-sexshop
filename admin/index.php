<?php


/**
 * este codigo deberia ser incluido 
 * en todas aquellas paginas que donde estar logueado es una necesidad
 * 
 */
@session_start();
include_once '../init.php';
include_once ROOT_DIR .'/entidades/usuario.php';
include_once ROOT_DIR .'/entidades/roll.php';

//si la encontramos sin nada redirigimos al toke
if(!session_is_registered('user')){//si no esta registrado lo redirigimos
    $_SESSION['login_wc'] = "Usted debe estar logueado para ver esta pagina";
    $_SESSION['login_req'] = $_SERVER['PHP_SELF'];
    $_SESSION['page_roll'] = Roll::$_USER_ADMIN;
    header( 'Location: '.USER_LOGIN) ;
    exit();
}else{
    $u = $_SESSION['user'];
    $oUser = new Usuario();
    //lo transformamos en objeto
    $oUser = unserialize($u);
    echo "bienvenido administrador! ".$oUser->getNombre();
    ?>
<br/>
<a href="product_panel">ver productos</a>
<br/>
<a href="user_manager.php?action=clear">logout</a>

<?php
}
?>
