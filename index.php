<?php
include_once "include/header.php";
?>
<div class='row' >
<div class='col-md-12' >

<a href='index.php?seccion=listar_productos' >Listar productos</a> &nbsp;|||&nbsp; <a href="index.php?seccion=mostrar_carrito"><i class="fa fa-shopping-cart" aria-hidden="true" title="Mirar carrito"></i></a>
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
        default:
            break;
    }
}
?>
</div>
</div>
</div>
<?php 
include "include/footer.php";
?>