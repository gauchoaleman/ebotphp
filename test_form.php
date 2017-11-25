<html>
<head><link rel="stylesheet" href="css/bootstrap.css" >

</head>
<body>
<form method='post' data-toggle='validator' role="form">

    Nombre: <input type='text' name='name' required id="inputName"><br>
    Apellido: <input type='text' name='surname' required><br>
    Teléfono: <input type='text' name='phone' required><br>
    Email: <input type='email' name='email' required><br>
    Clave (6 caracteres como mínimo): <input name="inputPassword" type='password' required
    data-minlength="6" class="form-control" id="inputPassword" placeholder="Clave"><br>
    Reingrese clave: <input type='password' name="inputPasswordConfirm" required class="form-control"
    id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Las claves no coinciden" placeholder="Confirmar"><br>

    Calle: <input type='text' name='calle' required>
    Nro: <input type='text' name='nrocalle' size=7 required><br>
    Ciudad: <input type='text' name='ciudad' required><br>
    Provincia: <input type='text' name='provincia' required><br>

<input type='submit' name='enviarreg' value="Completar registro">
</form>
<script src="js/bootstrap.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
<script src="js/validator.js"></script>
</body>
</html>
