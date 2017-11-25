<?php
include_once "include/connect_db.php";
include_once "include/site_functions.php";

if( isset($_GET["seccion"])) {

    switch ($_GET["seccion"]) {
        case "login_register":
          if(isset($_POST["enviarlogin"])){
            if( ($idusers=ChequearLogin($_POST))!= 0 ){
              $_SESSION["idusers"] = $idusers;
            }
          }

            break;
        case "logout":
            unset($_SESSION["idusers"]);
            break;
        default:
            break;
    }
}
?>
