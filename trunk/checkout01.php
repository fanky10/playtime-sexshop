﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
		<script src="js/action.js" type="text/javascript"></script><!--PROPIO-->
        <script src="js/jquery.validate.js" type="text/javascript"></script><!--EMAIL-->
        
        <!--[if lte IE 7]>
        <script type="text/javascript" src="js/supersleight-min.js"></script>
        <![endif]-->
        
        <SCRIPT type="text/javascript">
			$().ready(function() {
				// valida el formulario de CONTACTO
				$("#formCheckout01").validate();
			});
		</SCRIPT>
        
    </head>
    
    <body>
		<div class="wrapper">
			<div class="cabecera">
        		<a href="#" title="Inicio"><img class="logo" src="images/logo-playtime.png" alt="Play Time Sex Shop -  Boutique Er&oacute;tica" title="Play Time Sex Shop -  Boutique Er&oacute;tica" border="0" /></a>
				<ul class="menu">
					<li><a href="index.php">Inicio</a></li>
        	        <li><a href="tienda.php">Tienda</a></li>
        	        <li><a href="../blog">Blog</a></li>
        	        <li><a href="comprar.php">&iquest;C&oacute;mo Comprar?</a></li>
        	        <li><a href="contacto.php">Contacto</a></li>
				</ul><!--end menu-->
			</div><!--end cabecera-->
			
			<div class="superior">	
				<ul class="menu_acceso">
        	        <li id="home"><a href="#">Inicio</a></li>
        	        <li id="help"><a href="#">Ayuda</a></li>
        	        <li id="login"><a href="#">Acceso</a></li>
        	        <li id="cart"><a href="#">Compra (<strong>0</strong> Items)</a></li>
				</ul><!--end menu_acceso-->               
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
        	        	<div class="ruta"><a href="index.php">Inicio</a> / <a href="contacto.php">Contacto</a></div>
        	            
        	            <h1 class="categoria"><span>Informaci&oacute;n de cliente</span></h1>
        	            <p>Dolor sit amet consectetuer adipiscing elit sed diam nonummy. Lectores legere me lius, quod ii legunt saepius claritas est?Dolor sit amet consectetuer adipiscing elit sed diam nonummy. Lectores legere me lius, quod ii legunt saepius claritas est?</p>
                        
                        <form action="" method="post" id="formCheckout01">
                            <div class="formField">
                                <label>Nombre:</label>
                                <input id="formCheckoutNombre" name="formCheckoutNombre" class="inputData required" maxlength="255" value="" />
                            </div>
                            <div class="formField">
                                <label>Apellido:</label>
                                <input id="formCheckoutApellido" name="formCheckoutApellido" class="inputData required" maxlength="255" value="" />
                            </div>
                            <div class="formField">
                                <label>E-mail:</label>
                                <input id="formCheckoutMail" name= "formCheckoutMail" class="inputData required email" maxlength="255" value="" />
                            </div>
                            <div class="formField">
                                <label>Tel&eacute;fono:</label>
                                <input id="formCheckoutTel" name="formCheckoutTel" class="inputData number" maxlength="255" value="" />
                            </div>
                            
                            <div class="formField">
                                <label>Direcci&oacute;n:</label>
                                <input id="formCheckoutDireccion" name= "formCheckoutDireccion" class="inputData required" maxlength="255" value="" />
                            </div>
                            <div class="formField">
                                <label>Ciudad:</label>
                                <input id="formCheckoutCiudad" name="formCheckoutCiudad" class="inputData required" maxlength="255" value="" />
                            </div>
                            <div class="formField">
                                <label>C&oacute;digo Postal:</label>
                                <input id="formCheckoutPostal" name="formCheckoutPostal" class="inputData required" maxlength="255" value="" />
                            </div>
                            <div class="formField">
                               <label>Select:</label>
                               <select id="formCheckoutSelect"  name="formCheckoutSelect">
									<option selected="selected" value="arg">Opcion 01</option>
									<option value="02">Opcion 02</option>
									<option value="03">Opcion 03</option>
								</select>
                            </div>
                            <hr />
                            <input class="checkboxAgree" type="checkbox" id="formCheckoutAgree" name="formCheckoutAgree" />
                            <label>Acepto los t&eacute;rminos y condiciones de uso de este sitio web</label>
                            <div class="formButton">
                            	<input id="formCheckoutSubmit" class="formButton" type="submit" name="formCheckoutSubmit" value="continuar" />
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