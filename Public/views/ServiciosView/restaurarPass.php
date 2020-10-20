<!DOCTYPE html>
<html lang="es">

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

    <div class="card mx-auto sombre my-4 px-2 ocultar" style="width: 18rem;" id="Error">
      <div class="card-header">
        <h5 class="card-title my-auto"><i class="fas fa-exclamation-triangle text-danger"></i> Advertencia</h5>
      </div>
      <div class="card-body">
        <p class="card-text">
          Ocurrio un error inesperado intentelo de nuevo.
        </p>
      </div>
    </div>

    <div class="card mx-auto sombre my-4 px-2 ocultar" style="width: 18rem;" id="ErrorTime">
      <div class="card-header">
        <h5 class="card-title my-auto"><i class="fas fa-exclamation-triangle text-danger"></i> Advertencia</h5>
      </div>
      <div class="card-body">
        <p class="card-text">
          El tiempo para cambiar la contraseña expiro, de <a href="#" class="card-link">click aqui</a> para realizar una
          nueva solicitud
        </p>
      </div>
    </div>

    <form id="formulario" class="col-sm-12 col-md-6 p-2 fondoDos mx-auto mt-4 mb-4 text-white rounded ocultar"
      autocomplete="off">
      <h1 class="text-center border-bottom p-1">Restaurar Contraseña</h1>

      <div class="form-group">
        <label for="codigo">Codigo</label>
        <input class="form-control" type="text" name="codigo" id="codigo">
      </div>

      <div class="form-group">
        <label for="newPass">Nueva Contraseña</label>
        <input class="form-control" type="password" name="newPass" id="newPass">
      </div>

      <div class="form-group">
        <label for="confPass">Confirmar Contraseña</label>
        <input class="form-control" type="password" name="confPass" id="confPass">
      </div>

      <button type="submit" id="btn" class="btn btn-dark mx-auto d-block mb-2" disabled="disabled">
        Restaurar Contraseña
      </button>
    </form>

  </div>

  <?php 
    $footer = 'fixed-bottom';
    require_once("../Layout/footer.php");
  ?>

  <script src="../../js/servicio/restaurarPass.js"></script>
</body>

</html>