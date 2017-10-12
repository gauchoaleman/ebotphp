<?php
include "../include/connect_db.php";

if ( !isset($_SESSION["idusers"]))
echo "Acceso prohibido";
else {
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
}
// Liberar resultados

include "include/footer.php";   
// Cerrar la conexión
mysqli_close($link);?>