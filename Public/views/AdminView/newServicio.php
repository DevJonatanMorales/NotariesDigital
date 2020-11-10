<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
</head>

<body>
  <?php 
		$link= "servicio";
		require_once("../Layout/adminMenu.php");
	?>
  <main class="container my-4">

    <form class="fondoDos col-sm-12 col-md-5 p-2 mx-auto my-4 text-white rounded" action="#" method="post"
      id="formulario">
      <h1 class="text-center border-bottom p-1">Nuevo Servicio</h1>

      <div class="form-group">
        <label for="servicio">Nuevo servicio</label>
        <input class="form-control" type="text" id="servicio">
      </div>

      <div class="form-group">
        <label for="area">Área</label>
        <select class="form-control" name="area" id="area">

        </select>
      </div>

      <div class="form-group">
        <button class="btn btn-danger" type="submit" id="btnCancelarServicio">
          Cancelar
        </button>
        <button class="btn btn-dark" type="submit" id="btnGuadarServicio" disabled="disabled">
          Guardar
        </button>
      </div>
    </form>
  </main>

  <script src="../../js/admin/app.js"></script>
  <script src="../../js/admin/nuevoServicio.js"></script>
</body>

</html>