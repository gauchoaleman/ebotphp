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
<form method='post' data-toggle='validator' enctype='multipart/form-data' >
<div class='row'>
<div class='col-md-5'><input type='text' name='description' required></div>
<div class='col-md-5' style='height: 60x;'>
<?php ParentCombo(FALSE); ?>
</div>
<div class='col-md-2'><center><center><button name='Accion' value='Agregar'><i class='fa fa-plus' aria-hidden='true' title='Agregar categoría'></i></center></center></div>
</div>
</form>
<?php
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
<form method='post' data-toggle='validator' enctype='multipart/form-data' >
<div class='row'>
<div class='col-md-5'><input type='text' name='description' value='<?php echo $line["description"]; ?>' required></div>
<div class='col-md-5' style='height: 62px;'>
<?php ParentCombo($line["idparentcat"]);?>
</div>
<input type='hidden' name='idcattree' value='<?php echo $line["idcattree"];?>'>
<div class='col-md-1'><center><button name='Accion' value='Borrar'><i class='fa fa-times' aria-hidden='true' title='Borrar categoría'></i></center></div>
<div class='col-md-1'><center><button name='Accion' value='Modificar'><i class='fa fa-adjust' aria-hidden='true' title='Modificar categoría'></i></center></div>
</div>
</form>
<?php
}
?>