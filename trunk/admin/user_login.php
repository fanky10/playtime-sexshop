<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Play Time Sex Shop .::. Botique Erótica - ADMINISTRADOR</title>
        <meta name="keywords" content="juguetes, toys, Lubricantes, Anillos, Estimuladores Clitoreales, Placer Anal, Doble Penetraci&oacute;n, Siliconados, Hot Pink, Black Fantasy, Realistic, Funny, Cyberskin, Desarrolladores Peneanos, extensiones, Arneses, Mu&ntilde;ecas, Vaginas, Disfraces" />
        <meta name="description" content="Este es un sitio donde encontrar&aacute; muchas formas de dar placer a su pareja, formas de jugar y divertirse." />
		
		<!--CSS FILES-->
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		
		<!--JS FILES-->
        <script src="../js/jquery-1.5.js" type="text/javascript"></script>
        <script src="../js/jquery.metadata.js" type="text/javascript" ></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script><!--VALIDATION-->
        
        <script src="js/login.js" type="text/javascript"></script><!--VALIDA DATOS DE ENTRADA-->
        <?php
            @session_start();
            $wellcome = $_SESSION['login_wc'];
            $user_roll = $_SESSION['page_roll'];//el roll que necesita la pagina para redireccionarse
            $redirect = $_SESSION['login_req'];
            //armo los argumentos para el user_manager.php
            $args = "?";
            if(isset ($user_roll)){
                $args.= "valid_roll=$user_roll";
                //cuando el login de ok se unsetea
//                unset($_SESSION['page_roll']); //ya lo usamos ya fue
            }
            if(isset ($redirect)){
                $args.= "&redirect=$redirect";
                
            }
        ?>
    </head>
    <body class="form_admin_body">        
		<!-- MIO -->
		<div id="main_container">
			<div class="header_login">
		    	<div class="logo"><a href="#"><img src="../images/logo-playtime.png" alt="" title="MAWAPE" border="0" /></a></div>
		    	<div class="texto_admin">
			    	<?php
		            //si no esta seteado el mensaje de bienvenida le damos el de default
		            if(!isset ($wellcome)){
		                echo "<h1 align=\"center\">Bienvenido, Identifiquese por favor</h1>";
		                
		            }else{
		                echo "<h1 align=\"center\">$wellcome</h1>";
		                //cuando el login de ok se unsetea
						//unset($_SESSION['login_wc']); //ya lo usamos ya fue
		            }
		        	?>
		        </div>
		    </div><!-- end .header_login -->
			<div class="login_form">
				<h3>Panel de Administraci&oacute;n</h3>
					<a href="../index.php" class="forgot_pass">Volver a la web</a> 
					<form id="loginForm" class="niceform" action="user_manager.php<?php echo $args;?>" method="POST" align="center">
		                <fieldset>
		                    <dl>
		                        <dt><label for="email">Username:</label></dt>
		                        <dd>
		                        	<div class="NFTextLeft"></div>
		                        	<div class="NFTextCenter">
		                        		<input id="email" type="text" name="data[User][name]" size="54" class="NFText" />
	                        		</div>
		                        	<div class="NFTextRight"></div>
	                        	</dd>
		                    </dl>
		                    <dl>
		                        <dt><label for="password">Password:</label></dt>
		                        <dd>
	                        		<div class="NFTextLeft"></div>
	                        		<div class="NFTextCenter">
		                        		<input id="password" type="password" name="data[User][pass]" size="54" class="NFText" />
	                        		</div>
		                        	<div class="NFTextRight"></div>
	                        	</dd>
		                    </dl>
		                    
		                    <!--<dl>
		                        <dt><input type="checkbox" name="interests[]" id="" value="" class="" /></dt>
		                        <dd><label class="check_label">Remember me</label></dd>
		                    </dl>-->
		                    
		                     <dl class="submit">
		                     	<div class="NFButtonLeft"></div>
	                    		<input type="submit" value="Ingresar" id="boton" class="NFButton"/>
		                    	<div class="NFButtonRight"></div>
		                     </dl>
		                </fieldset>
		         </form>
		         <div class="footer_login">
					<div class="right_footer_login"><a href="http://www.mawape.com.ar"><img src="../images/logo-mawape.png" alt="" title="" border="0" /></a></div>
				</div>
		         </div><!-- end .nice_form -->
		</div><!-- end #main_container -->	
		<!-- MIO -->        
	</body>
</html>