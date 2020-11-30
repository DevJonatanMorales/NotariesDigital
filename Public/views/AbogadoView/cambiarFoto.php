<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
</head>

<body>
  <?php 
    $link = "perfil";
    require_once('../Layout/abogadoMenu.php');
  ?>
  <div class="container my-4">

    <form class="card col-ms-12 col-md-9 col-lg-5 mx-auto my-4 sombre" id="formulario" autocomplete="off">
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
        <button type="submit" class="btn btn-dark mx-auto d-block" id="btnFoto">
          Cambiar Foto
        </button>
      </div>
    </form>

  </div>

  <script src="../../js/abogado/app.js"></script>
  <script src="../../js/abogado/cambiarFoto.js"></script>
</body>

</html>