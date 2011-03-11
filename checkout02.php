<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
		<!--<script src="js/action.js" type="text/javascript"></script>PROPIO-->
        
        
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
                        
                		<form id="formCheckout02" action="factura.php" method="POST">
                                    <?php
                                        include 'cart_list_confirm.php';
                                    ?>
                                    <!--
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
                                    -->

                                    <?php

                                    include 'client_data.php';

                                    ?>
                                    <!--
							<div class="confirmationInfo">
								<h3>Por favor revise la informaci&oacute;n de envio y confirme la orden:</h3>
								<dl class="checkoutConfirmData">
									<dt>Direcci&oacute;n:</dt>
									<dd><span>Lavalle 2617</span> (<span>2452</span>) <span>San Jorge</span></dd>
								
									<dt>Metodo de env&iacute;o:</dt>
									<dd><span>Correo argentina, contrareembolso</span></dd>
								
									<dt>Otro dato:</dt>
									<dd><span>Lorem ipsum dolor sit amet</span></dd>
								</dl>
								
								<div class="formField">
                                	<label>Si lo desea puede dejar un comentario junto con su orden de compra:</label>
                                	<textarea id="comentario" name="comentario" class="required"></textarea> 
                            	</div>
							</div>
                                    -->
							
							<div class="formButton">
                            	<input id="formConfirmar" class="formButton" type="submit" name="formConfirmar" value="confirmar" />
                            </div>
                            
						</form>
                        
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