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
}else{
    $u = $_SESSION['user'];
    $oUser = new Usuario();
    //lo transformamos en objeto
    $oUser = unserialize($u);
	?>
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
        <script type="application/javascript">
        	
        </script>
	</head>
<body class="form_admin_body">
	<!-- MIO -->
		<div id="main_container">
			<div class="header_login">
		    	<div class="logo"><a href="#"><img src="../images/logo-playtime.png" alt="" title="Play Time Sex Shop" border="0" /></a></div>
		    	
	    		
	<div class="texto_admin">
		<h1>
			<?php
		    echo "Bienvenido ".$oUser->getNombre();
		    ?>
	    </h1>
	</div><!-- end .texto_admin -->
</div><!-- end .header_login -->    
	<div class="conteinerPage">
	<br/>
<!--<a href="product_panel.php">ver productos</a>
<br/>
<a href="categ_panel.php">ver categorias</a>
<br/>
<a href="user_manager.php?action=clear">logout</a>-->

		<a class="bt_green" href="categ_panel.php">
			<span class="bt_green_lft"></span>
			<strong>Categor&iacute;as</strong>
			<span class="bt_green_r"></span>
		</a>
		<br/>
		<a class="bt_green" href="product_panel.php">
			<span class="bt_green_lft"></span>
			<strong>Productos</strong>
			<span class="bt_green_r"></span>
		</a>
		<br/>
		<br/>
		<br/>
		<a class="bt_red" href="user_manager.php?action=clear">
			<span class="bt_red_lft"></span>
			<strong>Salir</strong>
			<span class="bt_red_r"></span>
		</a>
		<div class="footer_login">
			<div class="right_footer_login"><a href="http://www.mawape.com.ar"><img src="../images/logo-mawape.png" alt="" title="" border="0" /></a></div>
		</div>
	</div>
</div><!-- end #main_container -->

</body>
</html>
<?php
}
?>
