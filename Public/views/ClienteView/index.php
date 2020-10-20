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

            <div class="col-ms-12 col-md-11 mx-auto my-4">

              <div class="col-sm-12">
                <div class="row justify-content-around p-1">
                  <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
                    <img src="../../img/poderes.svg" class="card-img-top mt-2" alt="...">
                    <div class="card-body">
                      <a href="#" class="btn btn-dark col-sm-12">Poderes</a>
                    </div>
                  </div>

                  <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
                    <img src="../../img/HablaConTuAbogado.svg" class="card-img-top mt-2" alt="...">
                    <div class="card-body">
                      <a href="#" class="btn btn-dark col-sm-12">Habla con tu abogado</a>
                    </div>
                  </div>
                </div>

                <div class="row justify-content-around p-1">
                  <div class="card sombre col-sm-5 mb-4" style="width: 18rem;">
                    <img src="../../img/sociedad.svg" class="card-img-top mt-2" alt="...">
                    <div class="card-body">
                      <a href="#" class="btn btn-dark col-sm-12">Sociedades</a>
                    </div>
                  </div>

                  <div class="card sombre col-sm-5 mb-4" style="width: 18rem;">
                    <img src="../../img/contrato.svg" class="card-img-top mt-2" alt="...">
                    <div class="card-body">
                      <a href="#" class="btn btn-dark col-sm-12 mb-0">Contratos</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>

  <script src="../../js/cliente/app.js"></script>
</body>

</html>