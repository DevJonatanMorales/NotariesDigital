<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
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

            <div class="mx-auto d-block my-4 col-sm-12 col-md-10 col-lg-10">

              <div class="form-group  mr-auto">
                <input type="text" id="buscar" class="form-control col-sm-12 col-md-6"
                  placeholder="Buscar por servicio ó abogado">
              </div>

              <div class="table-responsive">
                <table class="table table-hover table-fixed table-striped bg-white">
                  <thead class="thead-dark">
                    <tr>
                      <th style="width: 205px" scope="col">Abogado</th>
                      <th style="width: 200px" scope="col">Servicio</th>
                      <th style="width: 650px" scope="col">Descripcion</th>
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
    </div>
    <!-- /#page-content-wrapper -->

  </div>

  <script src="../../js/cliente/app.js"></script>
  <script src="../../js/cliente/historial.js"></script>
</body>

</html>