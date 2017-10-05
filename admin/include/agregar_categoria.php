<?php
$query = "INSERT INTO cattree (description,idparentcat)";
$query .= " VALUES ('".$_POST['description']."',".$_POST['idparentcat'].");";

mysqli_query($link,$query) or die(mysqli_error());