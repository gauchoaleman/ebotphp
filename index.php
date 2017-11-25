<?php
include_once "include/header.php";
include_once "include/preproc.php";


?>
<div class='row' >
<div class='col-md-7' >
<a href='index.php?seccion=listar_productos' >Listar productos</a> &nbsp;|||&nbsp; <a href="index.php?seccion=mostrar_carrito"><i class="fa fa-shopping-cart" aria-hidden="true" title="Mirar carrito"></i></a>
</div>


<div class='col-md-1' >
<center><a href="index.php?seccion=login_register">Registro</a></center>
</div>

<?php
if( !isset($_SESSION["idusers"])){?>
<div class='col-md-1' >
<center><a href='index.php?seccion=login_register' >Ingresar</a></center>
</div><?php }
else {?>
<div class='col-md-1' >
<center><a href="index.php?seccion=logout">Salir</a></center>
</div>
<?php } ?>
<div class='col-md-3' >
<?php
if( isset($_SESSION["idusers"])){
  ?>
  <center>Hola <?php
      $UserData=GetUserData($_SESSION["idusers"]);
      echo $UserData["name"]; ?>!</center>
<?php
}?>
</div>

</div>
<div class='row'>
<div class='col-md-12'>
<?php

if( isset($_GET["seccion"])) {

    switch ($_GET["seccion"]) {
        case "listar_productos":
            include "listar_productos.php";
            break;
        case "mostrar_producto":
            include "mostrar_producto.php";
            break;
        case "mostrar_carrito":
            include "mostrar_carrito.php";
            break;
        case "agregar_a_carrito":
            include "agregar_a_carrito.php";
            break;
        case "logout":
            include "logout.php";
            break;
        case "login_register":
            include "login_register.php";
            break;
        case "enviar_pedido":
            include "enviar_pedido.php";
            break;
        case "test_form":
            include "test_form.php";
            break;
        default:
            include "portada.php";
            break;
    }
}
else
    include "portada.php";
?>
</div>
</div>
</div>
<?php
include "include/footer.php";
?>
