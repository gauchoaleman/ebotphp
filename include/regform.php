<div class='alert alert-success'>Si no estás registrado, podés hacerlo acá</div>
<form method='post' data-toggle='validator'>
<div class='row'>
<div class='col-md-6'>
    Nombre: <input type='text' name='name' required><br>
    Apellido: <input type='text' name='surname' required><br>
    Teléfono: <input type='text' name='phone' required><br>
    Email: <input type='email' name='email' required><br>
    Clave (6 caracteres como mínimo): <input name="inputPassword" type='password' required
    data-minlength="6" class="form-control" id="inputPassword" placeholder="Clave"><br>
    Reingrese clave: <input type='password' name="inputPasswordConfirm" required class="form-control"
    id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Las claves no coinciden" placeholder="Confirmar"><br>
</div>
<div class='col-md-6'>
    Calle: <input type='text' name='street' required>
    Nro: <input type='text' name='streetnr' size=7 required><br>
    Ciudad: <input type='text' name='city' required><br>
    Provincia: <input type='text' name='province' required><br>
</div>
<input type='submit' name='enviarreg' value="Completar registro">
</div>
</form>
