<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/SmallTable.css">
</head>

<body>
  <?php 
		$link= "cliente";
		require_once("../Layout/adminMenu.php");
	?>
  <div class="container my-4">
    <div class="mx-auto d-block my-4 col-sm-12 col-md-11 col-lg-8">

      <div class="p-1 my-4 fondoUno text-white">
        <h1 class="text-center OpenSans m-1">Dar de cliente</h1>
      </div>

      <div class="my-4">
        <input type="text" id="buscar" class="form-control col-sm-12 col-md-8 col-lg-6" placeholder="Buscar">
      </div>

      <div class="table-responsive sombre">
        <table class="table table-hover table-fixed ">
          <thead class="thead-dark">
            <tr>
              <th style="width: 80px" scope="col">Foto</th>
              <th style="width: 150px" scope="col">Usuario</th>
              <th style="width: 175px" scope="col">Nombre</th>
              <th style="width: 75px" scope="col">Estado</th>
              <th style="width: 230px" scope="col">Opcione</th>
            </tr>
          </thead>
          <tbody id="tbody">
          </tbody>
        </table>
      </div>

    </div>

  </div>

  <script src="../../js/admin/app.js"></script>
  <script src="../../js/admin/darBajaCliente.js"></script>
</body>

</html>