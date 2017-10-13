<?php
include_once "../include/connect_db.php";

function GetUserData($idusers)
{
    global $link;
    $query = "SELECT * FROM users WHERE idusers=$idusers;";
    $result = mysqli_query($link,$query) or die(mysqli_error());
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
?>