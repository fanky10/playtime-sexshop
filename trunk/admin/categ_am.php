
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
}
?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Play Time Sex Shop .::. Botique Er&oacute;tica - CONTACTO</title>
        <meta name="keywords" content="juguetes, toys, Lubricantes, Anillos, Estimuladores Clitoreales, Placer Anal, Doble Penetraci&oacute;n, Siliconados, Hot Pink, Black Fantasy, Realistic, Funny, Cyberskin, Desarrolladores Peneanos, extensiones, Arneses, Mu&ntilde;ecas, Vaginas, Disfraces" />
        <meta name="description" content="Este es un sitio donde encontrar&aacute; muchas formas de dar placer a su pareja, formas de jugar y divertirse." />
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
        
            <!--CSS FILES-->
        <link href="../css/style.css" rel="stylesheet" type="text/css" />

            <!--JS FILES-->
        <script src="../js/jquery-1.5.js" type="text/javascript"></script>
        <script src="../js/jquery.metadata.js" type="text/javascript" ></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script><!--VALIDATION-->
        
        <script src="../js/secciones/build.js" type="text/javascript"></script><!--ANCHO COLUMNAS-->
        <script src="js/amcategoria.js" type="text/javascript"></script><!--VALIDA DATOS DE ENTRADA-->
        <!--[if lte IE 7]>
        <script type="text/javascript" src="js/supersleight-min.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
        <div class="wrapper">
            <div class="contenedor">
                <div class="contenido">
                    <div id="contenido_central">
                        <div class="ruta"><a href="index.php">Inicio</a> / <a href="#">Admin</a></div>

                        
                        <?php
                        //chequeamos que tenga una accion por get y traemos los datos del producto
                        include_once '../init.php';
                        include_once ROOT_DIR .'/datos/productos.php';
                        include_once ROOT_DIR .'/datos/categorias.php';

                        include_once ROOT_DIR .'/entidades/producto.php';
                        
                        $action = $_GET["action"];
                        $id_producto = $_GET["id_producto"];
                        //argumentos para el handler
                        $args = "?action=";
                        
                        if($action == "upd" && isset ($id_producto)){
                            $args .=   "$action&id_producto=$id_producto";
                            $dProd = new DataProductos();
                            $oProd = $dProd->getProducto($id_producto);
                            //rearmamos el header
                            ?>
                            <h1 class="categoria"><span>Modificacion Producto</span></h1>
                            <p class="copy">Modifique los datos del producto.</p>
                            <?php
                        }else{
                            $args .= "add";
                            ?>
                            <h1 class="categoria"><span>Alta Producto</span></h1>
                            <p class="copy">Ingrese los datos de un nuevo producto.</p>
                            <?php
                        }
                        ?>
                        <form id="uploadForm" action="product_handler.php<?php echo $args;?>" method="POST" enctype="multipart/form-data">
<!--                            <fieldset style="display:none;"><input type="hidden" name="_method" value="POST" /></fieldset>-->

                            <div class="formField">
                                <label for="ProductName">Nombre Producto:</label>
                                <input name="data[Product][name]" type="text" class="inputData" maxlength="255" value="<?php echo (isset($oProd)?$oProd->getNombre():"");?>" id="ProductName" />                            
                            </div>
                            <div class="formField">
                                <label for="ProductCod">Codigo Producto:</label>
                                <input name="data[Product][codigo]" type="text" class="inputData" maxlength="255" value="<?php echo (isset($oProd)?$oProd->getCodigo():"");?>" id="ProductCod" />                            
                            </div>
                            <div class="formField">
                                <label for="ProductPrice">Precio Producto:</label>
                                <input name="data[Product][price]" type="text" class="inputData" maxlength="255" value="<?php echo (isset($oProd)?Utilidades::formatero_numero($oProd->getPrecio()):"");?>" id="ProductPrice" />                            
                            </div>
                            <div class="formField">
                                <label for="ProductDesc">Descripcion Producto:</label>
                                <textarea name="data[Product][descrip]" cols="5" rows="3" class="textArea" id="ProductDesc"><?php echo (isset($oProd)?$oProd->getDescription():"");?></textarea>
                            </div>
                            <div class="formField">
                                <?php
                                include 'opc_categorias.php';
                                ?>
                            </div>
                            <div class="formField">
                                <input name="MAX_FILE_SIZE" value="102400" type="hidden" id="MAX_FILE_SIZE"/>
                                <label for="ProductImage">Imagen Producto:</label>
                                <!--si estoy haciendo upd no m interesa validar" -->
                                <input name="file" type="file" class="inputData" id="ProductImage" <?php echo (isset($oProd)?"": "class=\"{validate:{required:true,accept:true}}\""); ?>/>                            
                            </div>
                            <div class="formButton">
                                <input type="submit" alt="Guardar" class="formButton" value="Guardar" />
                            </div>
                            <p></p>
                        </form>
                        <p id="mensaje"><strong>Aqui el mensaje de resultado!</strong></p>
                        
                    </div><!--end contenido_central-->

                </div><!--end contenido -->

            </div>
			
			
			
                <div class="pie_pagina">
                        <a class="mawape" href="http://www.mawape.com.ar" title="MAWAPE Sistemas"><img src="images/logo-mawape.png" alt="MAWAPE Sistemas" title="MAWAPE Sistemas" /></a>
                        <p class="copyright">&copy; Copyright 2011 - Play Time Sex Shop. Boutique Er&oacute;tica. Todos los derechos.</p>
                </div><!--end pie-pagina-->
		</div>
    </body>
</html>

