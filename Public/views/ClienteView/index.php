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

          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>

  <script src="../../js/cliente/foto.js"></script>
</body>

</html>