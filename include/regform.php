<div class='alert alert-success'>Si no estás registrado, podés hacerlo acá</div>
<form method='post' data-toggle='validator'>
<div class='row'>
<div class='col-md-6'>

  <div class='row' >
  <div class='col-md-6' style="height: 138px;" >
    Nombre: <input type='text' name='name' size=15 required><br>
    Apellido: <input type='text' name='surname' size=15 required><br>
</div>
  <div class='col-md-6' style="height: 138px;">
    Teléfono: <input type='text' name='phone' size=15 required><br>
    Email: <input type='email' name='email' size=17 required><br><br>
  </div>
</div>

    Clave (6 caracteres como mínimo): <input name="inputPassword" type='password' required
    data-minlength="6" class="form-control" id="inputPassword" placeholder="Clave"><br>

</div>
<div class='col-md-6'>

<div class="row">
  <div class='col-md-12' >
    Calle: <input type='text' name='street' size=15 required>
    Nro: <input type='text' name='streetnr' size=7 required><br>
    Ciudad: <input type='text' name='city' size=28 required><br>
    Provincia: <input type='text' name='province' size=26 required>
  </div>

</div>
Reingrese clave: <input type='password' name="inputPasswordConfirm" required class="form-control"
id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Las claves no coinciden" placeholder="Confirmar">
</div>
<input type='submit' name='enviarreg' value="Completar registro">
</div>
</form>
