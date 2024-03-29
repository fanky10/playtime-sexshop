<?php

/**
 * este script valida si la session esta seteada
 * y si tiene items en el carrito
 */
@session_start();
include_once 'entidades/shoppingcart.php';
include_once 'entidades/cliente.php';
$mensaje_error = null;
$mensaje_error = null;
if(!session_is_registered('cart')){
    $mensaje_error = "<h3> No tiene items agregados.</h3>";
}

$s = $_SESSION['cart'];
$oCart = unserialize($s);

$s = $_SESSION['client'];
$oClient = unserialize($s);


$arrItems = $oCart->getItems();
if(count($arrItems)<1){
    $mensaje_error = "<h3> No tiene items agregados.</h3>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Play Time Sex Shop .::. Botique Er&oacute;tica - CHECKOUT</title>
        <meta name="keywords" content="juguetes, toys, Lubricantes, Anillos, Estimuladores Clitoreales, Placer Anal, Doble Penetraci&oacute;n, Siliconados, Hot Pink, Black Fantasy, Realistic, Funny, Cyberskin, Desarrolladores Peneanos, extensiones, Arneses, Mu&ntilde;ecas, Vaginas, Disfraces" />
        <meta name="description" content="Este es un sitio donde encontrar&aacute; muchas formas de dar placer a su pareja, formas de jugar y divertirse." />
		
		<!--CSS FILES-->
		<link href="css/reset.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		
		<!--JS FILES-->
        <script src="js/jquery-1.5.js" type="text/javascript"></script>
        <script src="js/secciones/build.js" type="text/javascript"></script><!--ANCHO COLUMNAS-->
        <script src="js/secciones/checkout01.js" type="text/javascript"></script><!--PROPIO-->
        <script src="js/jquery.validate.js" type="text/javascript"></script><!--NEEDED FOR VALIDATIONS-->
        
        <!-- Modal -->
		<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
        <script type='text/javascript' src='js/jquery.simplemodal-1.4.1.js'></script>
        
        <script type="text/javascript">
        
			$().ready(function(){
/*******************************************************
*				RECARGAR PAGINA						   *	
********************************************************/
	$('#abrirTYC').click(function() {
            // Recargo la pagina
            $('.modalTYC#basic-modal-content').modal();
        });
});
		
        </script>
        
        <!--[if lte IE 7]>
        <script type="text/javascript" src="js/supersleight-min.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
		<div class="wrapper">
			<div class="cabecera">
        		<?php
					include 'cabecera.php';
				?>
			</div><!--end cabecera-->
			
			<div class="superior">	
				<?php
					include 'superior.php';
				?>         
			</div><!--end superior-->
			
			<div class="contenedor">
			
				<div class="lateral" id="lateral_izquierdo">
        	        <form action="#" method="post" class="buscador">
        	        	<div class="buscador_back">
        	                <div class="busc_left"></div>
        	                <input type="text" name="buscar" id="buscar" value="Buscar..." class="busc_middle" /> 
        	                <div class="busc_right"></div>
				    	</div>                            
        	        </form>
        	        
        	        <h3><span>Categor&iacute;as</span></h3>
        	        <?php
	                    include 'menu_categorias.php';
                        ?>
                        </div><!--end lateral_izquierdo-->
			
                    <div class="contenido">

                            <div id="contenido_central">
                                <?php
                                //TODO: verifica elementos en carrito
                                if(isset($mensaje_error) ){
                                    echo $mensaje_error;

                                }else{
                                ?>
                        <div class="ruta"><a href="index.php">Inicio</a> / <a href="contacto.php">Contacto</a></div>
        	            
        	            <h1 class="categoria"><span>Informaci&oacute;n de cliente</span></h1>
                            <p>Ingrese sus datos por favor</p>
        	            <!--
                            <p>Dolor sit amet consectetuer adipiscing elit sed diam nonummy. Lectores legere me lius, quod ii legunt saepius claritas est?Dolor sit amet consectetuer adipiscing elit sed diam nonummy. Lectores legere me lius, quod ii legunt saepius claritas est?</p>
                            -->
                            <form id="formCheckout01" action="client_handler.php?action=add&redirect=checkout02.php" method="POST">
                                <fieldset style="display:none;">
                                    <input type="hidden" name="_method" value="POST" />
                                </fieldset>
                                <div class="formField">
                                    <label for="formCheckoutNombre">Nombre:</label>
                                    <input name="data[User][name]" type="text" class="inputData" maxlength="255" value="" id="formCheckoutNombre" />
                                </div>
                                <div class="formField">
                                    <label>Apellido:</label>
                                    <input id="formCheckoutApellido" name="data[User][surname]" class="inputData required" maxlength="255" value="" />
                                </div>
                                <div class="formField">
                                    <label>E-mail:</label>
                                    <input id="formCheckoutMail" name= "data[User][email]" class="inputData required email" maxlength="255" value="" />
                                </div>
                                <div class="formField">
                                    <label>Tel&eacute;fono:</label>
                                    <input id="formCheckoutTel" name="data[User][phone]" class="inputData number" maxlength="255" value="" />
                                </div>

                                <div class="formField">
                                    <label>Direcci&oacute;n:</label>
                                    <input id="formCheckoutDireccion" name= "data[User][address]" class="inputData required" maxlength="255" value="" />
                                </div>
                                <div class="formField">
                                    <label>Ciudad:</label>
                                    <input id="formCheckoutCiudad" name="data[User][city]" class="inputData required" maxlength="255" value="" />
                                </div>
                                <div class="formField">
                                    <label>C&oacute;digo Postal:</label>
                                    <input id="formCheckoutPostal" name="data[User][postalc]" class="inputData required" maxlength="255" value="" />
                                </div>
                                <div class="formField">
                                    <?php
                                    include 'opc_zonas.php';
                                    ?>
                                </div>
                                <hr />
                                <label for="formCheckoutAgree">Acepto los <a href="#" id="abrirTYC">t&eacute;rminos y condiciones</a> de uso de este sitio web</label>
                                <input class="checkboxAgree" type="checkbox" id="formCheckoutAgree" name="data[User][agree]" />
                                <div class="formButton">
                                    <input id="formCheckoutSubmit" class="formButton" type="submit" name="formCheckoutSubmit" value="continuar" />
                                </div>
        	            </form>
        	            <?php
                            }//end else del check de error
                            ?>
					</div><!--end contenido_central-->
					
					<div class="lateral" id="lateral_derecho">
						<?php
	                    	include 'lateral_derecho.php';
                    	?>
					</div><!--end lateral_derecho-->
				
				</div><!--end contenido -->
			
			</div>
			
			<div class="inferior">
        	    <ul class="menu_acceso">
        	        <li id="info"><a href="#">Mas Informaci&oacute;n</a></li>
        	        <li id="top"><a href="#">Arriba</a></li>
				</ul><!--end menu_acceso-->  
				
				<!--ITEMS-->
					
				<div class="submenu">
				    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="tienda.php">Tienda</a></li>
                        <li><a href="../blog">Blog</a></li>
                        <li><a href="comprar.php">&iquest;C&oacute;mo Comprar?</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
				    </ul><!-- end menu_inferior -->
				    <a href="#" title="Inicio"><img class="logo-playtime-chico" src="images/logo-playtime-chico.png" alt="Play Time Sex Shop -  Boutique Er&oacute;tica" title="Play Time Sex Shop -  Boutique Er&oacute;tica" border="0" /></a>
				</div><!-- end submenu -->
					
			</div><!-- end inferior -->
			
			<div class="pie_pagina">
				<a class="mawape" href="http://www.mawape.com.ar" title="MAWAPE Sistemas"><img src="images/logo-mawape.png" alt="MAWAPE Sistemas" title="MAWAPE Sistemas" /></a>
				<p class="copyright">&copy; Copyright 2011 - Play Time Sex Shop. Boutique Er&oacute;tica. Todos los derechos.</p>
			</div><!--end pie-pagina-->
		</div>
        <!-- modal content -->
		<div id="basic-modal-content" class="modalTYC">
			<h3>Términos y Condiciones de Compra</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dapibus, tellus ac ornare aliquam, massa diam tristique urna, id faucibus lectus erat ut pede. Maecenas varius neque nec libero laoreet faucibus. Phasellus sodales, lectus sed vulputate rutrum, ipsum nulla lacinia magna, sed imperdiet ligula nisi eu ipsum.</p>
		</div>
		<!-- preload the images -->
		<div style='display:none'>
			<img src='images/x.png' alt='cerrrar' title="cerrar" />
		</div><!-- END modal content -->
    </body>
</html>