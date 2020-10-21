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

        <!-- comentario: conteido de la pagina -->
        <div class="container-fluid">
          <div class="d-flex justify-content-between">

            <div id="publicaciones" class="section col-sm-12">

              <div class="card col-ms-12 col-md-8 mx-auto my-4 sombre">
                <div class="card-header text-center">
                  <h5 class="card-title my-auto">Mi Perfil</h5>
                </div>
                <div class="card-body">
                  <img src="../../img/<?php echo $_SESSION['FOTO_USER']; ?>" class="card-img-top border mx-auto d-block"
                    alt="Error al cargar" style="width: 14rem;">

                  <div class="row form-group">
                   <p class="card-text col-sm-12 col-md-6" id="txtUser"></p>
                   <p class="card-text col-sm-12 col-md-6" id="txtNombre"></p>
                  </div>

                  <div class="row form-group">
                   <p class="card-text col-sm-12 col-md-6" id="txtApellido"></p>
                   <p class="card-text col-sm-12 col-md-6" id="txtGenero"></p>
                  </div>
                  
                  <div class="row form-group">
                   <p class="card-text col-sm-12 col-md-6" id="txtEdad"></p>
                   <p class="card-text col-sm-12 col-md-6" id="txtTelefono"></p>
                  </div>

                  <div class="row form-group">
                   <p class="card-text col-sm-12 col-md-6" id="txtEmail"></p>
                   <p class="card-text col-sm-12 col-md-6" id="txtDireccion"></p>
                  </div>

                  <a href="editarPerfil.php" class="btn btn-dark">Editar perfil</a>
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
  <script src="../../js/cliente/miPerfil.js"></script>
</body>

</html>