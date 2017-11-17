<?php
    include_once "include/connect_db.php";
    include_once "include/site_functions.php";
//session_start();




if(isset($_POST["email"])){
    if( ($idusers = ChequearLogin($_POST))!= 0 ){
        //$_SESSION["idusers"] = $idusers;
        echo "<div class='alert alert-success'>Logueado con éxito</div>";
        include("listar_productos.php");
      }
    else {?>
    <div class='row'>
    <div class='col-md-12'>
    <div class="alert alert-warning">Usuario y/o clave inválidos.</div>
    </div>
    </div>
    <?php
        include "include/loginform.php";
    }
}
else {
    include "include/loginform.php";
}?>
