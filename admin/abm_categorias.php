<?php
include "include/header.php";

$link = mysqli_connect('localhost', 'root', 'root')
or die('No se pudo conectar: ' . mysql_error());
mysqli_query($link,"USE ebotanicoandino;");
?>
<div class="page-header">
<h1>ABM categorias</h1>
</div>
<?php 

if( !isset($_POST["Accion"]))
    include "include/form_agregar_categoria.php";
else{
    switch ($_POST["Accion"])
    {
        case "Agregar":
            include "include/agregar_categoria.php";
            break;
        case "Modificar":
            include "include/modificar_categoria.php";
            break;
        case "Borrar":
            include "include/borrar_categoria.php";
            break;
    }
    include "include/form_agregar_categoria.php";
}

// Liberar resultados

include "include/footer.php";   
// Cerrar la conexión
mysqli_close($link);?>