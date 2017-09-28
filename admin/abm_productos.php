<?php
include "include/header.php";

$link = mysqli_connect('localhost', 'root', 'root')
or die('No se pudo conectar: ' . mysql_error());
mysqli_query($link,"USE ebotanicoandino;");
?>
<div class="page-header">
<h1>ABM productos</h1>
</div>
<?php 

if( !isset($_POST["Accion"]))
    include "include/form.php";
else{
    switch ($_POST["Accion"])
    {
        case "Agregar":
            include "include/agregar_producto.php";
            break;
        case "Modificar":
            include "include/modificar_producto.php";
            break;
        case "Borrar":
            include "include/borrar_producto.php";
            break;
    }
    include "include/form.php";
}

// Liberar resultados

// Cerrar la conexión
mysqli_close($link);

include "include/footer.php";   