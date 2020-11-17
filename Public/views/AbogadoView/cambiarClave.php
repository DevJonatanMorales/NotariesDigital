<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
  <link rel="stylesheet" type="text/css" href="../../css/servicios/registrate.css">
</head>

<body>
  <?php 
    $link = "perfil";
    require_once('../Layout/abogadoMenu.php');
  ?>

  <div class="container my-4">

    <form class="card col-ms-12 col-md-8 mx-auto my-4 sombre" id="formulario" autocomplete="off">
      <div class="card-header text-center">
        <h5 class="card-title my-auto">Cambiar Contraseña</h5>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="formulario__grupo col-sm-12" id="grupo__clave">
            <label for="clave" class="formulario__label OpenSans">Contraseña actual:</label>
            <div class="formulario__grupo-input">
              <input type="password" class="formulario__input border" name="clave" id="clave">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La contraseña solo puede contener letras mayusculas, letra
              minusculas, números y debe estar entre 6 a 10 dígito</p>
          </div>
        </div>

        <div class="row">
          <div class="formulario__grupo col-sm-12" id="grupo__newClave">
            <label for="newClave" class="formulario__label OpenSans">Nueva contraseña:</label>
            <div class="formulario__grupo-input">
              <input type="password" class="formulario__input border" name="newClave" id="newClave">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La contraseña solo puede contener letras mayusculas, letra
              minusculas, números y debe estar entre 6 a 10 dígito</p>
          </div>
        </div>

        <div class="row">
          <div class="formulario__grupo col-sm-12" id="grupo__confClave">
            <label for="confClave" class="formulario__label OpenSans">Confirmar contraseña:</label>
            <div class="formulario__grupo-input">
              <input type="password" class="formulario__input border" name="confClave" id="confClave">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La contraseña solo puede contener letras mayusculas, letra
              minusculas, números y debe estar entre 6 a 10 dígito</p>
          </div>
        </div>

      </div>

      <div class="form-group">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-dark" id="btnActualizar" disabled="disabled">
          Guardar cambios
        </button>
      </div>

    </form>

  </div>

  <script src="../../js/abogado/app.js"></script>
  <script src="../../js/abogado/cambiarClave.js"></script>
</body>

</html>