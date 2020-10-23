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
    $link = "upPerfil";
    require_once('../Layout/clienteMenu.php');
  ?>

  <div class="container my-4">
    <form class="card col-ms-12 col-md-8 mx-auto my-4 sombre" id="formulario" autocomplete="off">
      <div class="card-header text-center">
        <h5 class="card-title my-auto">Editar Perfil</h5>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="formulario__grupo col-sm-6" id="grupo__user">
            <label for="user" class="formulario__label OpenSans">Usuario:</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input border" name="user" id="user">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error" id="parafousuario">"El usuario tiene que ser de 3 a 10 dígitos
              y
              solo puede contener numeros, letras y guion bajo."</p>
          </div>

          <div class="formulario__grupo col-sm-6" id="grupo__telefono">
            <label for="telefono" class="formulario__label OpenSans">Telefono:</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input border" name="telefono" id="telefono">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El telefono solo puede contener números y el maximo son 14
              dígitos .</p>
          </div>
        </div>

        <div class="row">

          <div class="formulario__grupo col-sm-12" id="grupo__correo">
            <label for="correo" class="formulario__label OpenSans">Correo Electrónico</label>
            <div class="formulario__grupo-input">
              <input type="email" class="formulario__input border" name="correo" id="correo">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones
              y
              guion
              bajo.</p>
          </div>

        </div>

        <div class="formulario__grupo" id="grupo__direccion">
          <label for="direccion" class="formulario__label OpenSans">Dirección</label>
          <div class="formulario__grupo-input">
            <textarea class="formulario__textarea border" name="direccion" id="direccion" rows="3"></textarea>
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">Direccion es muy corta.</p>
        </div>

      </div>

      <div class="form-group">
        <a href="miPerfil.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-dark" id="btnActualizar">
          Guardar cambios
        </button>
      </div>

    </form>
  </div>

  <script src="../../js/cliente/app.js"></script>
  <script src="../../js/cliente/editarPerfil.js"></script>
</body>

</html>