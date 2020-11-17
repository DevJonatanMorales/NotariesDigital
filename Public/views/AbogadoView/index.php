<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
</head>

<body>
  <?php 
    $link = "Inicio";
    require_once('../Layout/abogadoMenu.php');
  ?>

  <div class="container my-4">
    <!-- comentario  -->
    <div class="row justify-content-around p-1">
      <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
        <div class="card-header">
          <h5 class="card-title text-center">Poderes</h5>
        </div>
        <img src="../../img/poderes.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <p class="card-text">
            Notaries Digital pone a tu disposición una lista de abogados que te pueden ayudar en tus tramites, poder
            de cobranzas, actos de administración y actos de dominio.
          </p>
        </div>
      </div>

      <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
        <div class="card-header">
          <h5 class="card-title text-center">Habla con tu abogado</h5>
        </div>
        <img src="../../img/HablaConTuAbogado.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <p class="card-text">
            Notaries Digital pone al alcance de tu mano una lista de abogados que te darán asesoría en cualquier
            tema o área que desees solo tienes que registrarte ya.
          </p>
        </div>
      </div>

    </div>
    <!-- comentario  -->
    <div class="row justify-content-around p-1">
      <div class="card sombre col-sm-5 mb-4" style="width: 18rem;">
        <div class="card-header">
          <h5 class="card-title text-center">Sociedades</h5>
        </div>
        <img src="../../img/sociedad.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <p class="card-text">
            Notaries Digital te ofrece servicios en la creación de sociedades mercantiles y civiles.
          </p>
        </div>
      </div>

      <div class="card sombre col-sm-5 mb-4" style="width: 18rem;">
        <div class="card-header">
          <h5 class="card-title text-center">Contratos</h5>
        </div>
        <img src="../../img/contrato.svg" class="card-img-top mt-2" alt="...">
        <div class="card-body">
          <p class="card-text">
            Notaries Digital pone a tu alcance una lista de abogados que te ayudaran en la elaboración de tu
            contratos solo tienes que regístrate.
          </p>
        </div>
      </div>
    </div>

  </div>
  <script src="../../js/cliente/app.js"></script>
</body>

</html>