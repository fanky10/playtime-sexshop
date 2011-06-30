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
        <script src="../js/jquery.form.js" type="text/javascript" ></script><!--SEND FORM-->
        
        <script src="../js/secciones/build.js" type="text/javascript"></script><!--ANCHO COLUMNAS-->
        <script src="js/amzona.js" type="text/javascript"></script><!--VALIDA DATOS DE ENTRADA-->
        <!--[if lte IE 7]>
        <script type="text/javascript" src="js/supersleight-min.js"></script>
        <![endif]-->
        
        <script type="application/javascript">
        	$(document).ready(function() {
  				$("li#help, li#login, #cart_status, .lateral").hide();
  				$('#contenido_central').css('margin', '0 200px');
			});
        </script>
        
    </head>
    
    <body>
        <div class="wrapper">
        	<div class="cabecera">
				<div class="header_login">
			    	<div class="logo"><a href="#"><img src="../images/logo-playtime.png" alt="" title="Play Time Sex Shop" border="0" /></a></div>
			    </div>
			</div><!--end cabecera-->
			<div class="superior">	
				<?php
                    include_once ROOT_DIR .'/superior.php';
					//include 'superior.php';
				?>
			</div><!--end superior-->
            <div class="contenedor">
                <div class="contenido">
                    <div id="contenido_central">
                        <div class="ruta"><a href="index.php">Inicio</a> / <a href="index.php">Login</a> / Zonas</div>                        
                        <?php
                        //TODO CHANGE
                        //chequeamos que tenga una accion por get y traemos los datos del producto
                        include_once ROOT_DIR .'/datos/zonas.php';
                        include_once ROOT_DIR .'/entidades/zona.php';
                        
                        $action = $_GET["action"];
                        $id_zona = $_GET["id_zona"];
                        //argumentos para el handler
                        $args = "?action=";
                        
                        if($action == "upd" && isset ($id_zona)){
                            //rearmamos el header
                            $args .=   "$action&id_zona=$id_zona";
                            $dZone = new DataZonas();
                            $oZone = $dZone->getZona($id_zona);
                            
                            ?>
                            <h1 class="categoria"><span>Modificacion Zona</span></h1>
                            <p class="copy">Modifique los datos de la zona.</p>
                            <?php
                        }else{
                            $args .= "add";
                            ?>
                            <h1 class="categoria"><span>Alta Zona</span></h1>
                            <p class="copy">Ingrese los datos de una nueva zona.</p>
                            <?php
                        }
                        ?>
                        <form id="uploadFormZona" action="zone_handler.php<?php echo $args;?>" method="POST" >

                            <div class="formField">
                                <label for="ZoneName">Nombre Zona:</label>
                                <input name="data[Zona][name]" type="text" class="inputData" maxlength="255" value="<?php echo (isset($oZone)?$oZone->getNombre():"");?>" id="ZoneName" />                            
                            </div>
                            <div class="formField">
                                <label for="ZonePrice">Precio Producto:</label>
                                <input name="data[Zona][price]" type="text" class="inputData" maxlength="255" value="<?php echo (isset($oZone)?Utilidades::formatero_numero($oZone->getPrecio()):"");?>" id="ZonePrice" />                            
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
