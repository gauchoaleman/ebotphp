<?php
include_once "connect_db.php";

//Devuelve Datos de usuario a partir de una id de usuario ($idusers)
function GetUserData($idusers)
{
    global $link;
    $query = "SELECT * FROM users WHERE idusers=$idusers;";
    $result = mysqli_query($link,$query) or die(mysqli_error());
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
?>