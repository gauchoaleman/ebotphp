<?php
$query = "UPDATE cattree SET description = '".$_POST['description']."',idparentcat=".$_POST['idparentcat']." WHERE idcattree = ".$_POST["idcattree"].";";
echo $query;
mysqli_query($link,$query) or die(mysqli_error());
?>