<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/BigTable.css">
</head>

<body>
  <?php 
		$link= "servicio";
		require_once("../Layout/adminMenu.php");
	?>
  <div class="container my-4">

    <div class="mx-auto d-block my-4 col-sm-12 col-md-12">

      <div class="p-1 my-4 fondoUno text-white">
        <h1 class="text-center OpenSans m-1">Lista de servicios</h1>
      </div>

      <div class="my-4">
        <input type="text" id="buscar" class="form-control col-sm-12 col-md-6" placeholder="Buscar servicio">
      </div>

      <div class="table-responsive sombre">
        <table class="table table-hover table-fixed table-striped bg-white">
          <thead class="thead-dark">
            <tr>
              <th style="width: 500px" scope="col">Servicio</th>
              <th style="width: 370px" scope="col">Área</th>
              <th style="width: 210px" scope="col">Acción</th>
            </tr>
          </thead>
          <tbody id="tbody">

          </tbody>
        </table>
      </div>

    </div>

  </div>

  <script src="../../js/admin/app.js"></script>
  <script src="../../js/admin/listServicios.js"></script>
</body>

</html>