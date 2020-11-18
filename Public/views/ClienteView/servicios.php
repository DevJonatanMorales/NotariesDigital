<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
  <link rel="stylesheet" type="text/css" href="../../css/SmallTable.css">
</head>

<body>
  <?php 
    $link = "servicio";
    require_once('../Layout/clienteMenu.php');
  ?>
  <div class="container">
    <div class="col-md-8 mx-auto d-block">
      <div class="p-1 my-4 fondoUno text-white">
        <h1 class="text-center OpenSans m-1">Servicios</h1>
      </div>

      <div class="col-sm-12 p-0">

        <div class="row">
          <div class="form-group row col-sm-8">
            <label class="col-sm-2 col-form-label">Áreas</label>
            <div class="col-sm-12 col-md-8">
              <select class="form-control col-12" id="areas">

              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <input type="text" id="buscar" class="form-control" placeholder="Buscar servicio por nombre o categoria">
          </div>
        </div>

        <div class="table-responsive my-4">
          <table class="table table-hover table-fixed">
            <thead class="thead-light">
              <tr>
                <th style="width: 310px" scope="col">Nombre del servicion</th>
                <th style="width: 200px" scope="col">Área</th>
                <th style="width: 200px" scope="col">Opcion</th>
              </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="../../js/cliente/app.js"></script>
  <script src="../../js/cliente/servicios.js"></script>
</body>

</html>