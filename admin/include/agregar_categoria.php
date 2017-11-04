<?php
// Agrega categoría a partir de variables post que vienen de formulario
$query = "INSERT INTO cattree (description,idparentcat)";
$query .= " VALUES ('".$_POST['description']."',".$_POST['idparentcat'].");";

mysqli_query($link,$query) or die(mysqli_error());

echo "<div class='alert alert-primary'>Categoría agregada</div>";