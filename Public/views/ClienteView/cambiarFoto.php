<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
</head>

<body>
  <?php 
    $link = "";
    require_once('../Layout/clienteMenu.php');
  ?>
  <div class="container my-4">

    <form class="card col-ms-12 col-md-5 mx-auto my-4 sombre" id="formulario" autocomplete="off"
      enctype="multipart/form-data" action="../../../Private/Models/ClienteModels/perfilUserModel.php" method="post">
      <div class="card-header text-center">
        <h5 class="card-title my-auto">Cambiar Foto</h5>
      </div>
      <div class="alert alert-info my-2 text-center" role="alert">
        Haga click sobre la foto
      </div>
      <input type="hidden" name="accionActualizarFoto">
      <div class="form-group col-sm-12 my-4">
        <div class="photo">
          <div class="prevPhoto">
            <span class="delPhoto notBlock">X</span>
            <label for="foto"></label>
          </div>
          <div class="upimg">
            <input type="file" name="foto" id="foto">
          </div>
          <div id="form_alert"></div>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-dark mx-auto d-block" id="btnFoto" disabled="disabled">
          Cambiar Foto
        </button>
      </div>
    </form>

  </div>

  <script src="../../js/cliente/app.js"></script>
  <script src="../../js/cliente/cambiarFoto.js"></script>
</body>

</html>