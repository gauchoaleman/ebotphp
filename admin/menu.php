<?php
include "include/header.php";
?>
<div class="container">
<div class='row' >
<div class='col-md-12' >

<a href='menu.php' >Menu</a>|<a href='menu.php?seccion=ABMcategorias' >ABM de categorías</a>|<a href='menu.php?seccion=ABMproductos'>ABM de productos</a>
</div>
</div>
<div class='row'>
<div class='col-md-12'>
<?php
if( isset($_GET["seccion"])) {

    switch ($_GET["seccion"]) {
        case "ABMcategorias":
            include "abm_categorias.php";
            break;
        case "ABMproductos":
            include "abm_productos.php";
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