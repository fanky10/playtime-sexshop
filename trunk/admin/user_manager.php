<?php
@session_start();
include_once '../init.php';
include_once ROOT_DIR .'/datos/usuarios.php';
//VAR_DUMP FOR DEBUGGING
//echo "VAR DUMP $_POST:<p />";
//var_dump($_POST);
//foreach($_FILES as $file) {
//    $n = $file['name'];
//    $s = $file['size'];
//    if (!$n) continue;
//    echo "File: $n ($s bytes)";
//}

//
if(!isset ($action)){
    $action = $_GET["action"];
}
if($action=="clear"){
    session_unregister('user');
    header( 'Location: '.ROOT_URL . '/index.php' ) ;
    exit();
}
$user = $_POST[data][User][name];
$pass = $_POST[data][User][pass];

//redireccionamiento
$redirect = $_GET["redirect"];
if(!isset ($redirect)){
    $redirect = ROOT_URL . '/index.php';
}

$roll = $_GET["valid_roll"];
if(!isset ($roll)){
    //si no esta seteado lo redirigimos al main sin escrupulos
    $redirect = ROOT_URL . '/index.php';
}

//si esta logueado correctamente 
$dUser = new DataUsuarios();
$usuario_hab = $dUser->isUsuarioHabilitado($user, $pass);

if($usuario_hab){//$user == "admin" && $pass == "admin"){
    //si salio todo bien unset la session vars
    unset($_SESSION['login_wc']); //ya lo usamos ya fue
    unset($_SESSION['page_roll']);
    unset($_SESSION['login_req']);
    header( 'Location: '.$redirect ) ;
}else{
    header( 'Location: '.USER_LOGIN ) ;
}
?>
<?php

?>
<!--Esto es inutil
    <form action="cart_handler.php?action=add" method="POST" id="formProducto">
        <div class="formField">
            <label>IdProducto</label>
            <input id="cantidad" name="prod_id" class="inputData required number" maxlength="3" value="1"/>

        </div>
        
        <div class="formField">
            <label>Cantidad:</label>
            <input id="cantidad" name="qty" class="inputData required number" maxlength="3" value="1"/>

        </div>
        <div class="formButton">
            <input id="comprar" class="formButton" type="submit" name="action" value="add" />
        </div>
    </form>


    <form action="cart_handler.php" method="GET" id="formProducto">
        <div class="formField">
            <label>IdProducto</label>
            <input id="cantidad" name="prod_id" class="inputData required number" maxlength="3" value="1"/>

        </div>
        <div class="formButton">
            <input id="comprar" class="formButton" type="submit" name="action" value="del" />
        </div>

    </form>
    <form action="cart_handler.php" method="GET" id="formProducto">
        <div class="formField">
            <label>IdProducto</label>
            <input id="cantidad" name="prod_id" class="inputData required number" maxlength="3" value="1"/>
            <label>Cantidad</label>
            <input id="cantidad" name="qty" class="inputData required number" maxlength="3" value="1"/>
        </div>
        <div class="formButton">
            <input id="comprar" class="formButton" type="submit" name="action" value="upd" />
        </div>
    </form>
    <br>
    <a href="?action=show_list">show list to me</a>
    <br>
    <a href="?action=show_status">show status</a>
    <br>
    -->
 