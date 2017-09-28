<?php
function CategoryCombo($selected)
{
    global $link;
    $result = mysqli_query($link,"SELECT description,idcattree FROM cattree");

    echo "<select name='cidcattree'>";
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='".$line['idcattree']."'";
        if ($line['idcattree'] == $selected)
            echo " selected ";
        echo " >".$line['description']."</option>\n\r";
    }
    echo "</select>";
    mysqli_free_result($result);
}

mysqli_select_db($link,'ebotanicoandino') or die('No se pudo seleccionar la base de datos');
mysqli_query($link,"SET NAMES 'utf8'");

$result = mysqli_query($link,"SELECT p.description as pdescription,c.idcattree as cidcattree,p.price as price,p.idproducts as idproducts FROM products p,cattree c WHERE p.cattree_idcattree=c.idcattree");

echo "<form method='post' data-toggle='validator'>";
echo "<div class='row'>";
echo "<div class='col-md-4'><input type='text' name='pdescription' required></div>";
echo "<div class='col-md-3' style='height: 58px;'>";
CategoryCombo(FALSE);
echo "</div>";
echo "<div class='col-md-3'><input type='text' name='price' required></div>";
echo "<input type='hidden' name='idproducts'>";
echo "<div class='col-md-2'><center><input type='submit' name='Accion' value='Agregar'></center></div>";
echo "</div>";
echo "</form>";

while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<form method='post' data-toggle='validator' >";
    echo "<div class='row'>";
    echo "<div class='col-md-4'><input type='text' name='pdescription' value='".$line["pdescription"]."' required></div>";
    echo "<div class='col-md-3' style='height: 58px;'>";
    CategoryCombo($line["cidcattree"]);
    echo "</div>";
    echo "<div class='col-md-3'><input type='text' name='price' value='".$line["price"]."' required></div>";
    echo "<input type='hidden' name='idproducts' value='".$line["idproducts"]."'>";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Borrar'></center></div>";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Modificar'></center></div>";
    echo "</div>";
    echo "</form>";
}