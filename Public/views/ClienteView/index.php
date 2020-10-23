<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
</head>

<body>
  <?php 
    $link = "Inicio";
    require_once('../Layout/clienteMenu.php');
  ?>
  <div class="container my-4">
    <!-- comentario  -->
    <div class="row justify-content-around p-1">
      <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
        <img src="../../img/poderes.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <a href="poderes.php" class="btn btn-dark col-sm-12">Poderes</a>
        </div>
      </div>

      <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
        <img src="../../img/HablaConTuAbogado.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <a href="asesoria.php" class="btn btn-dark col-sm-12">Habla con tu abogado</a>
        </div>
      </div>

    </div>
    <!-- comentario  -->
    <div class="row justify-content-around p-1">
      <div class="card sombre col-sm-5 mb-4" style="width: 18rem;">
        <img src="../../img/sociedad.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <a href="sociedades.php" class="btn btn-dark col-sm-12">Sociedades</a>
        </div>
      </div>

      <div class="card sombre col-sm-5 mb-4" style="width: 18rem;">
        <img src="../../img/contrato.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <a href="contratos.php" class="btn btn-dark col-sm-12 mb-0">Contratos</a>
        </div>
      </div>
    </div>

  </div>
  <script src="../../js/cliente/app.js"></script>
</body>

</html>