<?php
function CategoryCombo($selected)
{
    global $link;
    $result = mysqli_query($link,"SELECT description,idcattree FROM cattree ORDER BY idcattree");

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
?>
<div class='row'>
<div class='col-md-3'  align='center'>Descripción</div>
<div class='col-md-2'  align='center' style='height: 52px;'>Categoría</div>
<div class='col-md-2'  align='center'>Precio</div>
<div class='col-md-3'  align='center'>Imágen</div>
<div class='col-md-2'>&nbsp;</div>
</div>
<?php
echo "<form method='post' data-toggle='validator' enctype='multipart/form-data' >";
echo "<div class='row'>";
echo "<div class='col-md-3'><input type='text' name='pdescription' required></div>";
echo "<div class='col-md-2' style='height: 58px;'>";
CategoryCombo(FALSE);
echo "</div>";
echo "<div class='col-md-2'><input type='text' name='price' type='number'></div>";
echo "<div class='col-md-3'><input type='file' name='picture' style='height: 26px;'></div>";
echo "<input type='hidden' name='MAX_FILE_SIZE' value='3000000000' />";
echo "<div class='col-md-2'><center><input type='submit' name='Accion' value='Agregar'></center></div>";
echo "</div>";
echo "</form>";

while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<form method='post' data-toggle='validator' enctype='multipart/form-data'>";
    echo "<div class='row'>";
    echo "<div class='col-md-3' ><input type='text' name='pdescription' value='".$line["pdescription"]."' required></div>"; 
    echo "<div class='col-md-2' style='height: 58px;'>";
    CategoryCombo($line["cidcattree"]);
    echo "</div>";
    echo "<div class='col-md-2'><input type='text' name='price' value='".$line["price"]."' required></div>";
    echo "<div class='col-md-3'><input type='file' name='picture' style='height: 26px;'><a target='_blank' href='../img/prod/".$line['idproducts'].".png'>Ver foto</a></div>";
    echo "<input type='hidden' name='idproducts' value='".$line["idproducts"]."'>";
    echo "<input type='hidden' name='MAX_FILE_SIZE' value='3000000000' />";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Borrar'></center></div>";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Modificar'></center></div>";
    echo "</div>";
    echo "</form>";
}
?>