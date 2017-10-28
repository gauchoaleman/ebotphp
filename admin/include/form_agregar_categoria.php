<?php
function ParentCombo($idparentcat)
{
    global $link;
    $result = mysqli_query($link,"SELECT description,idcattree FROM cattree ORDER BY idcattree ASC");

    echo "<select name='idparentcat'>";
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='".$line['idcattree']."'";
        if ($line['idcattree'] == $idparentcat)
            echo " selected ";
        echo " >".$line['description']."</option>\n\r";
    }
    echo "</select>";
    mysqli_free_result($result);
}

mysqli_select_db($link,'ebotanicoandino') or die('No se pudo seleccionar la base de datos');
mysqli_query($link,"SET NAMES 'utf8'");

$result = mysqli_query($link,"SELECT description,idparentcat,idcattree FROM cattree ");
?>
<div class='row'>
<div class='col-md-5' align='center'>Descripción</div>
<div class='col-md-5'  align='center'>
Categoría del padre
</div>
<div class='col-md-2'>&nbsp;</div>
</div>
<?php
echo "<form method='post' data-toggle='validator' enctype='multipart/form-data' >";
echo "<div class='row'>";
echo "<div class='col-md-5'><input type='text' name='description' required></div>";
echo "<div class='col-md-5' style='height: 60x;'>";
ParentCombo(FALSE);
echo "</div>";
echo "<div class='col-md-2'><center><input type='submit' name='Accion' value='Agregar'></center></div>";
echo "</div>";
echo "</form>";

while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<form method='post' data-toggle='validator' enctype='multipart/form-data' >";
    echo "<div class='row'>";
    echo "<div class='col-md-5'><input type='text' name='description' value='".$line["description"]."' required></div>";
    echo "<div class='col-md-5' style='height: 62px;'>";
    ParentCombo($line["idparentcat"]);
    echo "</div>";
    echo "<input type='hidden' name='idcattree' value='".$line["idcattree"]."'>";    
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Borrar'></center></div>";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Modificar'></center></div>";
    echo "</div>";
    echo "</form>";
}
?>