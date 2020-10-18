<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
</head>

<body>
  <?php 
    $link = "login";
    require_once("../Layout/serviciosMenu.php"); 
  ?>

  <div class="container">
    <form id="formulario" class="col-sm-12 col-md-8 p-2 fondoDos mx-auto mt-4 mb-4 text-white rounded"
      autocomplete="off">
      <h1 class="text-center border-bottom p-1">Iniciar Sesión</h1>

      <!-- Grupo: Usuario -->
      <div class="form-group">
        <label for="user">Usuario</label>
        <input class="form-control" type="text" name="user" id="user">
      </div>

      <!-- Grupo: pass -->
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input class="form-control" type="text" name="pass" id="pass">
      </div>

      <div class="form-group">
        <button type="submit" id="btnCuenta" class="btn btn-dark mt-4 d-block mx-auto">
          Iniciar Sesión
        </button>
      </div>

      <div class="form-group text-center">
        <a href="recuperarPass.php" class="card-link text-white">Olvidó su
          contraseña</a><span> / </span><a href="registrate.php" class="card-link text-white">Crear
          Cuenta</a>
      </div>
    </form>

  </div>


  <?php 
    $footer = 'fixed-bottom';
    require_once("../Layout/footer.php");
  ?>
  <script src="../../js/login.js"></script>
</body>

</html>