<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
</head>

<body>
  <?php 
    $link = "index";
    require_once("../Layout/serviciosMenu.php"); 
  ?>

  <div class="container">
    <div class="row">
      <!-- informacion de Notaries Digital -->
      <div class="col-sm-4">
        <img class="card-img-top" style="width: 18rem;" src="../../img/notariesdigital.png" alt="">
      </div>
      <div class="col-sm-8 p-4">
        <p class="OpenSans h4"><span class="display-4 OpenSans">¿Ques es Notaries Digital?</span>es una aplicación web
          donde podrás realizar tus tramites notariales en línea y consultorías.</p>
        <P class="OpenSans h4">
          Así que te invitamos a que te regístrate en nuestra aplicación web totalmente gratis con solo dar <a
            href="registrate.php" class="card-link">Click aqui</a>
        </P>

      </div>
    </div>
    <!-- servicios -->
    <div class="">
      <div class="p-1 my-4 fondoUno text-white">
        <h1 class="text-center OpenSans m-1">Servicios</h1>
      </div>

      <div class="col-sm-12">
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

    </div>
  </div>

  <?php require_once("../Layout/footer.php") ?>

</body>

</html>