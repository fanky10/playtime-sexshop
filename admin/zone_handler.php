<?php
/**
 * este es el manejador del producto: alta,baja y modificacion
 * 
 */
@include_once '../init.php';
@include_once ROOT_DIR .'/datos/zonas.php';

//la accion puede ser seteada de forma externa
if(!isset ($action)){
    $action = $_GET["action"];
}
//el id_prod tmn
if(!isset ($id_zona)){
    $id_zona = $_GET["id_zona"];
}
//creo el objeto 
//luego veo que accion tomar
$zona = new Zona();
$zona->setNombre($_POST['data'][Zona][name]);
$zona->setPrecio($_POST['data'][Zona][price]);

//VAR_DUMP FOR DEBUGGING
//    echo "VAR DUMP $_POST:<p />";
//    var_dump($_POST);
//    foreach($_FILES as $file) {
//        $n = $file['name'];
//        $s = $file['size'];
//        if (!$n) continue;
//        echo "File: $n ($s bytes)";
//    }
    

if(isset ($message)){
    echo "<br/> $message";
}
//para hacer insert
if($action=="add"){
    $dZone = new DataZonas();
    $dZone->addZona($zona);
    echo "zona agregada correctamente";
    
}else if($action=="upd" && isset($id_zona)){
    $zona->setId($id_zona);
    
    $dZone = new DataZonas();
    $dZone->updZona($zona);
    echo "zona modificada correctamente";
    
}else if($action=="del" && isset($id_zona)){
    $zona->setId($id_zona);
    
    $dZone = new DataZonas();
    $dZone->delZona($zona);
    echo "zona eliminada correctamente </br> <a href=\"zone_panel.php\">volver</a>";
}else{
    echo "accion unknown! $action";
}

//si es necesario redireccionar:

if(isset ($_GET["redirect"])){
    header( 'Location: '.$_GET["redirect"] ) ;
}
?>