<?php
    include_once "../include/connect_db.php";
    include_once "../include/site_functions.php";
?>
<html>
 <head>
  <title>Login</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/grid.css" rel="stylesheet">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 </head>
 <body>
 <div class="container">
<?php
session_start();

if(isset($_POST["email"])){
    if( ($idusers = ChequearLoginAdmin($_POST))!= 0 ){
        $_SESSION["idusers"] = $idusers;
        header('Location: menu.php');
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
}
?>
</div>
</body>
