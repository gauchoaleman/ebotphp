<?php
function EmailUsado($email){
  global $link;
  $query = "SELECT COUNT(*) as cuenta FROM users WHERE email='$email';";
  $result = mysqli_query($link,$query);
  $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if($line["cuenta"] == 0)
    return FALSE;
  else
    return TRUE;
}

if(isset($_POST["enviarlogin"])){
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
        include "include/regform.php";
    }
}
elseif(isset($_POST["enviarreg"])){
  if($_POST["inputPassword"] != $_POST["inputPasswordConfirm"]){
    ?><div class="alert alert-warning">Las claves ingresadas no coinciden.</div><?php
    include "include/loginform.php";
    include "include/regform.php";
  }
  elseif (EmailUsado($_POST["email"])){
    ?><div class="alert alert-warning">El email ya está registrado</div><?php
    include "include/loginform.php";
    include "include/regform.php";
  }
  else {
    extract($_POST);
    $query = "INSERT INTO users (email,name,surname,phone,street,streetnr,city,province,password) ";
    $query .= "VALUES ('$email','$name','$surname','$phone','$street','$streetnr','$city','$province','$inputPassword')";
    $result = mysqli_query($link,$query);
  }
}
else {
    include "include/loginform.php";
    include "include/regform.php";
}?>
