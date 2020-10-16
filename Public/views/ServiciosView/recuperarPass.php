<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("../Layout/head.php");  ?>
  <link rel="stylesheet" type="text/css" href="../../css/servicios/registrate.css">
</head>

<body>
  <?php 
    $link = "login";
    require_once("../Layout/serviciosMenu.php"); 
  ?>
  <div class="container">

    <form id="formulario" class="col-sm-12 col-md-6 p-2 fondoDos mx-auto mt-4 mb-4 text-white rounded"
      autocomplete="off">
      <h1 class="text-center border-bottom p-1">Recuperar Contraseña</h1>

      <div class="row my-4">
        <div class="formulario__grupo col-sm-12" id="grupo__correo">
          <label for="correo" class="formulario__label OpenSans">Correo Electrónico</label>
          <div class="formulario__grupo-input">
            <input type="email" class="formulario__input" name="correo" id="correo"
              placeholder="Por favor ingrese su correo electrónico">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error" id="infoCorreo"></p>
        </div>
      </div>

      <button type="submit" id="btnCorreo" onkeyup="ValidarCorreo()" class="btn btn-dark mx-auto d-block mb-2"
        disabled="disabled">
        Recuperar Contraseña
      </button>
    </form>

  </div>

  <?php 
    $footer = 'fixed-bottom';
    require_once("../Layout/footer.php");
  ?>

  <script src="../../js/servicio/recuperarPass.js"></script>
</body>

</html>