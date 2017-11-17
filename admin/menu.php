<?php
include_once "include/header.php";
?>

<div class='row' >
<div class='col-md-9' >

<a href='menu.php' >Menu</a>&nbsp;|||&nbsp;<a href='menu.php?seccion=ABMcategorias' >Categorías</a>&nbsp;|||&nbsp;<a href='menu.php?seccion=ABMproductos'>Productos</a>&nbsp;|||&nbsp;<a href='../index.php'>Front End</a>
</div>
<div class='col-md-2' >
<center>Hola <?php
    $UserData=GetUserData($_SESSION["idusers"]);
    echo $UserData["name"]; ?>!</center>
</div>
<div class='col-md-1' >
<a href="index.php?seccion=logout">Logout</a>
</div>
</div>
<div class='row'>
<div class='col-md-12'>
<?php
if(!isset($_SESSION["idusers"]))
    echo "<div class='alert alert-info'>Debe estar logueado para acceder a ésta página. <a href='login.php'>Click aquí</a> para loguearse.</div>";
else if( !$UserData["isadmin"] )
  echo "<div class='alert alert-danger'>No tiene derechos para acceder a esta página.</div>";
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
