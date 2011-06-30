<?php
/**
 * este es el manejador de las categorias: alta,baja y modificacion
 * 
 */
include_once '../init.php';
include_once ROOT_DIR .'/datos/categorias.php';

//la accion puede ser seteada de forma externa
if(!isset ($action)){
    $action = $_GET["action"];
}
//el id_prod tmn
if(!isset ($id_categoria)){
    $id_categoria = $_GET["id_categoria"];
}
//creo el objeto 
//luego veo que accion tomar
$categ = new Categoria();
$categ->setNombre($_POST['data'][Categ][name]);
//$id_categoria = (int) $_POST['data'][Product][category];
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
    
    $dCat = new DataCategorias();
    $dCat->addCategoria($categ);
    echo "categoria insertada correctamente!";
    
}else if($action=="upd" && isset($id_categoria)){
    $categ->setId_Categoria($id_categoria);
    
    $dCateg = new DataCategorias();
    $dCateg->updCategoria($categ);
    echo "categoria modificada correctamente!";
}else if($action=="del" && isset($id_categoria)){
    //en del solo interesa el id_producto xD
    $categ->setId_Categoria($id_categoria);
    $dCateg = new DataCategorias();
    $dCateg->delCategoria($categ);
    echo "categoria eliminada! </br> <a href=\"categ_panel.php\">volver</a>";
}else{
    echo "accion unknown! $action";
}

//si es necesario redireccionar:

if(isset ($_GET["redirect"])){
    header( 'Location: '.$_GET["redirect"] ) ;
}
//funcion que devuelve una imagen o nada

function img(){
    $attName = 'file';//nombre del attributo tipo file
    $message;//mensaje de error u ok
    if (isset($_FILES[$attName]) && $_FILES[$attName]['size'] > 0) { 

          // Temporary file name stored on the server
          $tmpName  = $_FILES[$attName]['tmp_name'];  

          // Read the file 
          $fp      = fopen($tmpName, 'r');
          $data = fread($fp, filesize($tmpName));
          $data = addslashes($data);
          fclose($fp);
          return $data;
          //insert the file
//          $dImg = new DataImagenes();
//          $dImg->insertImg($data);
//          $id_img = $dImg->getUltimoID();
//
//          //insert the product
//          $producto->setImagen($id_img);
//          $dProd = new DataProductos();
//          $dProd->addProducto($producto);
//          $id_producto = $dProd->getUltimoID();
//          //insert the product-category
//          $dCateg = new DataCategorias();
//          $dCateg->addCategoriaProducto($id_categoria, $id_producto);

    }
    else {
        //lo maneja el jquery.validate pero por si las dudas... :P
//       $message = "No image selected/uploaded";
        return ;
    }
}
?>