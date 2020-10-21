<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
  <link rel="stylesheet" type="text/css" href="../../css/servicios/registrate.css">
</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <?php require_once('../Layout/clienteMenu.php'); ?>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light fondo border-bottom">
          <button class="btnMenu btn" id="menu-toggle">
            <span><i class="fas fa-ellipsis-v"></i></span>
          </button>

        </nav>

        <div class="container-fluid">
          <div class="d-flex justify-content-between ">

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
                    <p class="formulario__input-error">La contraseña solo puede contener letras mayusculas, letra minusculas y numeros.</p>
                  </div>
                </div>

                <div class="row">
                  <div class="formulario__grupo col-sm-12" id="grupo__newClave">
                    <label for="newClave" class="formulario__label OpenSans">Nueva contraseña:</label>
                    <div class="formulario__grupo-input">
                      <input type="password" class="formulario__input border" name="newClave" id="newClave">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña solo puede contener letras mayusculas, letra minusculas y numeros.</p>
                  </div>
                </div>

                <div class="row">
                  <div class="formulario__grupo col-sm-12" id="grupo__confClave">
                    <label for="confClave" class="formulario__label OpenSans">Confirmar contraseña:</label>
                    <div class="formulario__grupo-input">
                      <input type="password" class="formulario__input border" name="confClave" id="confClave">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El contraseña solo puede contener letras mayusculas, letra minusculas y numeros.</p>
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
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>

  <script src="../../js/cliente/app.js"></script>
  <script src="../../js/cliente/cambiarClave.js"></script>
</body>

</html>