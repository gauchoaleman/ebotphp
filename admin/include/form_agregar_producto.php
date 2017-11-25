<?php
include_once("../include/site_functions.php");

mysqli_select_db($link,'ebotanicoandino') or die('No se pudo seleccionar la base de datos');
mysqli_query($link,"SET NAMES 'utf8'");

$result = mysqli_query($link,"SELECT p.name as name,p.description as pdescription,c.idcattree as cidcattree,p.price as price,p.idproducts as idproducts FROM products p,cattree c WHERE p.cattree_idcattree=c.idcattree");
?>
<div class='row'>
<div class='col-md-3'  align='center'>Nombre</div>
<div class='col-md-2'  align='center' style='height: 56px;'>Categoría</div>
<div class='col-md-1'  align='center'>Precio</div>
<div class='col-md-4'  align='center'>Imágen</div>
<div class='col-md-2'>&nbsp;</div>
</div>
<form method='post' data-toggle='validator' enctype='multipart/form-data' >
<div class='row'>
<div class='col-md-3'><input type='text' name='name' required></div>
<div class='col-md-2' >
<?php CategoryCombo(FALSE); ?>
</div>
<div class='col-md-1'>$<input name='price' size=2 type='text'></div>
<div class='col-md-4'><input type='file' name='picture' style='height: 26px;'></div>
<input type='hidden' name='MAX_FILE_SIZE' value='3000000000' />
<div class='col-md-2'><center><button name='Accion' value='Agregar'><i class='fa fa-plus' aria-hidden='true' title='Agregar producto'></i></center></div>
<div class='col-md-12'><textarea rows='4' cols='120' required name='pdescription'>Descripción</textarea></div>
</div>
</form>
<br>
<?php
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
<form method='post' data-toggle='validator' enctype='multipart/form-data'>
<div class='row'  style='height: 220px;'>
<div class='col-md-3' style='height: 78px;'><input type='text' name='name' value='<?php echo $line["name"]; ?>' required></div>
<div class='col-md-2' style='height: 78px;'>
<?php CategoryCombo($line["cidcattree"]); ?>
</div>
<div class='col-md-1' style='height: 78px;'>$<input name='price' size=2 type='text' name='price'  value='<?php echo $line["price"];?>' required></div>
<div class='col-md-4' style='height: 78px;'><input type='file' name='picture' ><a target='_blank' href='../img/prod/<?php echo $line['idproducts']?>.png'><br>Ver foto</a></div>
<input type='hidden' name='idproducts' value='<?php echo $line["idproducts"]?>'>
<input type='hidden' name='MAX_FILE_SIZE' value='3000000000' />
<div class='col-md-1' style='height: 78px;'><center><button name='Accion' value='Borrar'><i class='fa fa-times' aria-hidden='true' title='Borrar producto'></i></center></div>
<div class='col-md-1' style='height: 78px;'><center><button name='Accion' value='Modificar'><i class='fa fa-pencil' aria-hidden='true' title='Modificar producto'></i></center></div>
<div class='col-md-12'><textarea rows='4' cols='120' required name='pdescription'><?php echo $line["pdescription"];?></textarea></div>
</div>
</form>
<?php
}
?>
