
<ul class="menu_acceso">
    <li id="home"><a href="index.php">Inicio</a></li>
    <li id="help"><a href="#">Ayuda</a></li>
    <li id="login"><a href="#">Acceso</a></li>
    <div id="cart_status">
        <?php
          $action = "show_status";
          include 'cart_handler.php';
        ?>
    </div>
</ul><!--end menu_acceso-->

<div class="carOverview">
    <?php
    include 'cart_preview.php';
    ?>
</div>