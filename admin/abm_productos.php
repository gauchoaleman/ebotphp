<?php
include "include/header.php";

print_r($_POST);

function CategoryCombo()
{
    global $link;
    $result = mysqli_query($link,"SELECT description,idcattree FROM cattree");

    echo "<select>";
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='".$line['idcattree']."'>".$line['description']."</option>";
    }
    echo "</select>";
    mysqli_free_result($result);
}

$link = mysqli_connect('localhost', 'root', 'root')
or die('No se pudo conectar: ' . mysql_error());
?>
<div class="page-header">
<h1>ABM productos</h1>
<h3 align='right'><a href='abm_productos.php?Accion=Agregar'>+</h3>
</div>
<?
mysqli_select_db($link,'ebotanicoandino') or die('No se pudo seleccionar la base de datos');
mysqli_query($link,"SET NAMES 'utf8'");

$result = mysqli_query($link,"SELECT p.description as pdescription,c.description as cdescription,p.price as price,p.idproducts as idproducts FROM products p,cattree c WHERE p.cattree_idcattree=c.idcattree");

while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<form method='post'>";
    echo "<div class='row'>";
    echo "<div class='col-md-4'><input type='text' name='pdescription' value='".$line["pdescription"]."'></div>";
    echo "<div class='col-md-3' style='height: 58px;'>";
    CategoryCombo();
    echo "</div>";
    echo "<div class='col-md-3'><input type='text' name='price' value='".$line["price"]."'></div>";
    echo "<input type='hidden' name='idproducts' value='".$line["idproducts"]."'>";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Borrar'></center></div>";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Modificar'></center></div>";
    echo "</div>";
    echo "</form>";
}

// Liberar resultados
mysqli_free_result($result);
// Cerrar la conexión
mysqli_close($link);

include "include/footer.php";