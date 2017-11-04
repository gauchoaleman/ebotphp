<?php
$query = "UPDATE cattree SET description = '".$_POST['description']."',idparentcat=".$_POST['idparentcat']." WHERE idcattree = ".$_POST["idcattree"].";";
mysqli_query($link,$query) or die(mysqli_error());
echo "<div class='alert alert-primary'>Categoría modificada</div>";
?>