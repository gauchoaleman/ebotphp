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

echo "<div class='row'>";
echo "<div class='col-md-5' align='center'>Descripción</div>";
echo "<div class='col-md-5'  align='center'>";
echo "Categoría del padre";
echo "</div>";
echo "<div class='col-md-2'>&nbsp;</div>";
echo "</div>";
echo "</form>";

echo "<form method='post' data-toggle='validator' enctype='multipart/form-data' >";
echo "<div class='row'>";
echo "<div class='col-md-5'><input type='text' name='description' required></div>";
echo "<div class='col-md-5' style='height: 58px;'>";
ParentCombo(FALSE);
echo "</div>";
echo "<div class='col-md-2'><center><input type='submit' name='Accion' value='Agregar'></center></div>";
echo "</div>";
echo "</form>";

while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<form method='post' data-toggle='validator' enctype='multipart/form-data' >";
    echo "<div class='row'>";
    echo "<div class='col-md-5'><input type='text' name='description' value='".$line["description"]."' required></div>";
    echo "<div class='col-md-5' style='height: 58px;'>";
    ParentCombo($line["idparentcat"]);
    echo "</div>";
    echo "<input type='hidden' name='idcattree' value='".$line["idcattree"]."'>";    
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Borrar'></center></div>";
    echo "<div class='col-md-1'><center><input type='submit' name='Accion' value='Modificar'></center></div>";
    echo "</div>";
    echo "</form>";
}
?>