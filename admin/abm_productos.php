<?php
include "../include/connect_db.php";

if ( !isset($_SESSION["idusers"]))
    echo "Acceso prohibido";
else {

if( !isset($_POST["Accion"]))
    include "include/form_agregar_producto.php";
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
        include "include/form_agregar_producto.php";
    }
}
// Liberar resultados

include "include/footer.php";   
// Cerrar la conexión
mysqli_close($link);?>