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

function CategoryCombo($selected)
{
    global $link;
    $result = mysqli_query($link,"SELECT description,idcattree FROM cattree ORDER BY idcattree");

    echo "<select name='cidcattree'>";
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='".$line['idcattree']."'";
        if ($line['idcattree'] == $selected)
            echo " selected ";
        echo " >".$line['description']."</option>\n\r";
    }
    echo "</select>";
    mysqli_free_result($result);
}

function ChequearLogin($datos){
    global $link;

    $query = "SELECT idusers,name FROM users WHERE email='".$datos['email']."' AND password='".$datos['password']."';";
    //echo $query;
    $result = mysqli_query($link,$query) or die(mysqli_error());
    $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if( !$line )
        return 0;
    else
        return $line['idusers'];
}
?>
