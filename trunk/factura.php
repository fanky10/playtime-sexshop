<?php

/**
 * este script valida si la session esta seteada
 * y si tiene items en el carrito
 */
@session_start();
include_once 'entidades/shoppingcart.php';
include_once 'entidades/cliente.php';
$mensaje_error = null;
if(!session_is_registered('cart')){
    $mensaje_error = "<h3> No tiene items agregados.</h3>";
}
if(!session_is_registered('client')){
    $mensaje_error = "<h3> No existen datos sobre el cliente. Ingreselos <a href=\"checkout01.php\">aqui</a></h3>";
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

﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Play Time Sex Shop .::. Botique Erótica - PRODUCTO</title>
        <meta name="keywords" content="juguetes, toys, Lubricantes, Anillos, Estimuladores Clitoreales, Placer Anal, Doble Penetraci&oacute;n, Siliconados, Hot Pink, Black Fantasy, Realistic, Funny, Cyberskin, Desarrolladores Peneanos, extensiones, Arneses, Mu&ntilde;ecas, Vaginas, Disfraces" />
        <meta name="description" content="Este es un sitio donde encontrar&aacute; muchas formas de dar placer a su pareja, formas de jugar y divertirse." />
		
		<!--CSS FILES-->
		<link href="css/style.css" rel="stylesheet" type="text/css" />

		<!--JS FILES-->
        <script src="js/jquery-1.5.js" type="text/javascript"></script>
		<script src="js/secciones/build.js" type="text/javascript"></script><!--ANCHO COLUMNAS-->
        
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
                    ?><!--end categorias-->
				    
				</div><!--end lateral_izquierdo-->
			
				<div class="contenido">
					
					<div id="contenido_central">
        	        	<div class="ruta"><a href="index.php">Inicio</a> / <a href="tienda.php">Tienda</a> / <a href="#">Lubricantes</a> / Producto</div>
        	            <h1 class="categoria"><span>Confirmaci&oacute;n de compra</span></h1>
                            <?php //TODO: llamar a enviar email
                                if(isset($mensaje_error) ){
                                    echo $mensaje_error;

                                }else{//si no tiene ningun mensaje de error..
                                    include_once 'entidades/email.php';
                                    $comment = $_POST["comentario"];
                                    $email = new Email();
                                    if($email->enviarEmail($comment)){
                            ?>
        	            <p class="copy">Esta misma factura de compra se le ha enviado a su direcci&oacute;n de correo electr&oacute;nico</p>
                            <?php
                                    include 'cart_factura.php';
                                    }
                                    else{
                                        echo "Error no se pudo enviar el email";
                                    }
                                    //ya sea que se envio o no el email
                                    session_unset();
                                }

                            ?>
                            <!--
                		<div id="factura">
                			<div class="facturaHeader">
                				<img src="images/logo-factura.png" alt="Play Time Sex Shop" />
                				<h4>Play Time Sex Shop</h4> 
                				<p class="contactInfo">
        	            			<span class="contactTel">(011) - 156777777</span>
        	            			<span class="contactMSN">ventas@playtimesexshop.coms</span>
        	            			<span class="contactMail">info@playtimesexshop.com</span>
                        		</p>
                			</div>
                			
                			<div class="confirmationInfo">
							    <h3>Informaci&oacute;n del pedido</h3>
							    <dl class="checkoutConfirmData">
							    	<dt>Nro. de Orden:</dt>
							    	<dd><span>023499623498586</span></dd>
							    
							    	<dt>Fecha:</dt>
							    	<dd><span>Sabado 29 de diciembre, 2010</span></dd>
							    
							    	<dt>Estado:</dt>
							    	<dd><span>Pendiente</span></dd>
							    </dl>
							</div>
							
							<div class="confirmationInfo">
							    <h3>Informaci&oacute;n de cobro y env&iacute;o</h3>
							    <dl class="checkoutConfirmData">
							    	<dt>E-mail:</dt>
							    	<dd><span>usuario@dominio.com</span></dd>
							    
							    	<dt>Nombre:</dt>
							    	<dd><span>Juan Ramon Corazon De Leon</span></dd>
							    	
							    	<dt>Apellido:</dt>
							    	<dd><span>Rabinowitz</span></dd>
							    	
							    	<dt>Direcci&oacute;n:</dt>
							    	<dd><span>Avenida Siempreviva 742</span></dd>
							    	
							    	<dt>C&oacute;digo Postal:</dt>
							    	<dd><span>2000</span></dd>
							    	
							    	<dt>Ciudad:</dt>
							    	<dd><span>Rosario</span></dd>
							    	
							    	<dt>Provincia:</dt>
							    	<dd><span>Santa Fe</span></dd>
							    	
							    	<dt>Tel&eacute;fono:</dt>
							    	<dd><span>(0341) 444 4444</span></dd>
							    </dl>
							    
							    <hr />
							    
							    <dl class="checkoutConfirmData">
							    	<dt>Empresa:</dt>
							    	<dd><span>Correo Argentino</span></dd>
							    
							    	<dt>M&eacute;todo:</dt>
							    	<dd><span>Env&iacute;o contrareembolso</span></dd>
							    
							    	<dt>Costo del envi&iacute;o:</dt>
							    	<dd><span>$ 50.-</span></dd>
							    </dl>
							</div>
							
							<div class="confirmationInfo">
							    <h3>Informaci&oacute;n de pago</h3>
							    <dl class="checkoutConfirmData">
							    	<dt>M&eacute;todo de pago:</dt>
							    	<dd><span>Pago contrareembolso en la direcci&oacute;n otorgada</span></dd>
							    </dl>
							</div>
                			
                			<table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
							    <tr>
							    	<th class="line-left">Detalle</th>
							    	<th class="line-left cartSKU">SKU</th>
							    	<th class="line-left cartPrecio">Precio</th>
							    	<th class="line-left cartCantidad">Cantidad</th>
							    	<th class="line-left cartSubtotal">Total</th>
							    </tr>
							    <tr>
							    	<td>Pito de goma</td>
							    	<td>096RT</td>
							    	<td>$ 158.45</td>
							    	<td>1</td>
							    	<td>$ 158.45</td>
							    </tr>
							    <tr class="alternate-row">
							    	<td>Pito de goma</td>
							    	<td>096RT</td>
							    	<td>$ 158.45</td>
							    	<td>1</td>
							    	<td>$ 158.45</td>
							    </tr>
							    <tr>
							    	<td colspan="4" class="cartTotal">Subtotal</td>
							    	<td>$ 158.45</td>
							    </tr>
							    <tr class="alternate-row">
							    	<td colspan="4" class="cartTotal">Manejo y empaque</td>
							    	<td>$ 15.00</td>
							    </tr>
							    <tr>
							    	<td colspan="4" class="cartTotal">IVA</td>
							    	<td>$ 15.80</td>
							    </tr>
							    <tr class="alternate-row">
							    	<td colspan="4" class="cartTotal"><strong>Total</strong></td>
							    	<td><strong>$ 999.00</strong></td>
							    </tr>
							</table>
							
							<div class="confirmationInfo">
							    <h3>Comentarios adicionales</h3>
							    <dl class="checkoutConfirmData">
							    	<dt>Su comentario:</dt>
							    	<dd><span>Duis dolore te feugait nulla facilisi nam liber tempor cum soluta. Sit amet consectetuer adipiscing elit sed diam nonummy nibh. Duis dolore te feugait nulla facilisi nam liber tempor cum soluta. Sit amet consectetuer adipiscing elit sed diam nonummy nibh.</span></dd>
							    </dl>
							</div>
							
						</div>
                            -->

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
    </body>
</html>