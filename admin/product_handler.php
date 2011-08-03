<?php
/**
 * este es el manejador del producto: alta,baja y modificacion
 * 
 */
include_once '../init.php';
include_once ROOT_DIR .'/datos/imagenes.php';
include_once ROOT_DIR .'/datos/productos.php';
include_once ROOT_DIR .'/datos/categorias.php';

include_once ROOT_DIR .'/entidades/producto.php';

//la accion puede ser seteada de forma externa
if(!isset ($action)){
    $action = $_GET["action"];
}
//el id_prod tmn
if(!isset ($id_producto)){
    $id_producto = $_GET["id_producto"];
}
//creo el objeto 
//luego veo que accion tomar
$producto = new Producto();
$producto->setCodigo($_POST['data'][Product][codigo]);
$producto->setDescripcion($_POST['data'][Product][descrip]);
$producto->setImagen(-1);
$producto->setInformacion("");
$producto->setMarca(-1);
$producto->setNombre($_POST['data'][Product][name]);
$producto->setPrecio($_POST['data'][Product][price]);
$id_categoria = $_POST['data'][Product][category];
 
//VAR_DUMP FOR DEBUGGING
//    echo "VAR DUMP $_POST:<p />";
//    var_dump($_POST);
//    foreach($_FILES as $file) {
//        $n = $file['name'];
//        $s = $file['size'];
//        if (!$n) continue;
//        echo "File: $n ($s bytes)";
//    }
//if( is_array($id_categoria)){
//    while (list ($key, $val) = each ($id_categoria)) {
//    echo "$val <br>";
//    }
//}else{
//    echo "not array";
//}   

if(isset ($message)){
    echo "<br/> $message";
}
//para hacer insert
if($action=="add"){
    //si no selecciono imagen no hago nada
    $data = img();
    if(!isset ($data)){
        //ver si funca ajajjaja
        echo "no data for image";
        return;
    }
    
    //insert the file
    $dImg = new DataImagenes();
    $dImg->insertImg($data);
    $id_img = $dImg->getUltimoID();

    //insert the product
    $producto->setImagen($id_img);
    $dProd = new DataProductos();
    $dProd->addProducto($producto);
    $id_producto = $dProd->getUltimoID();
    //insert the product-category
    $dCateg = new DataCategorias();
    $dCateg->addCategoriaProducto($id_categoria, $id_producto);
    echo "producto insertado correctamente!";
    
}else if($action=="upd" && isset($id_producto)){
    //en upd no interesa si la imagen es renovada o no
    $producto->setId_Producto($id_producto);
    $data = img();
    if(isset ($data)){
        //insert the file
        $dImg = new DataImagenes();
        $dImg->insertImg($data);
        $id_img = $dImg->getUltimoID();

        //insert the product
        $producto->setImagen($id_img);
    }else{
        $producto->setImagen(-1);
    }
    
    $dProd = new DataProductos();
    $dProd->updProducto($producto);
    
    //update the product-category
    $dCateg = new DataCategorias();
    $dCateg->addCategoriaProducto($id_categoria, $id_producto);
    echo "producto modificado correctamente!";
}else if($action=="del" && isset($id_producto)){
    //en del solo interesa el id_producto xD
    $producto->setId_Producto($id_producto);
    $dProd = new DataProductos();
    $dProd->delProducto($producto);
    echo "producto eliminado! </br> <a href=\"product_panel.php\">volver</a>";
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