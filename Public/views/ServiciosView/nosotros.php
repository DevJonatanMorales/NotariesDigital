<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
</head>

<body>
  <?php 
    $link = "nosotros";
    require_once("../Layout/serviciosMenu.php"); 
  ?>

  <div class="container">

    <div class="p-1 my-4 fondoUno text-white">
      <h1 class="text-center OpenSans m-1">Nosotros</h1>
    </div>

    <div class="row d-flex justify-content-around">
      <div class="card sombre col-sm-12 col-md-3 mt-0 mb-4 mx-2" style="width: 18rem;">
        <img src="../../img/valores.svg" class="card-img-top m-2" alt="...">
        <div class="card-body">
          <h5 class="card-title">Valores</h5>
          <ul class="card-text">
            <li>
              <p>Confianza.</p>
            </li>
            <li>
              <p>Justicia.</p>
            </li>
            <li>
              <p>Profesionalismo.</p>
            </li>
            <li>
              <p>Innovación.</p>
            </li>
            <li>
              <p>Ética.</p>
            </li>
            <li>
              <p>Lealtad.</p>
            </li>
            <li>
              <p>Privacidad.</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="card sombre col-sm-12 col-md-3 mt-0 mb-4 mx-2" style="width: 18rem;">
        <img src="../../img/mision.svg" class="card-img-top m-2" alt="...">
        <div class="card-body">
          <h5 class="card-title">Misión</h5>
          <p class="card-text">
            Somos una aplicación web que brinda servicios de consultorías y permite realizar tramites
            legales basados en las leyes salvadoreñas directamente con Abogados de la Republica de El Salvador,
            totalmente en línea y de esta manera facilitar en muchos sentidos el proceso de realizar un tramite legal a
            diferencia de cuando se hace en la vía común.
          </p>
        </div>
      </div>

      <div class="card sombre col-sm-12 col-md-3 mt-0 mb-4 mx-2" style="width: 18rem;">
        <img src="../../img/vision.svg" class="card-img-top m-2" alt="...">
        <div class="card-body">
          <h5 class="card-title">Visión</h5>
          <p class="card-text">Alcanzar la integración de muchos más tramites legales a la aplicación y que puedan
            hacerse completamente en línea, de esta manera ayudar y resolver mas problemas de nuestros clientes ya sea
            que nuestros clientes estén dentro o fuera de nuestro país siempre y cuando su tramite se rija por las leyes
            de El Salvador.</p>
        </div>
      </div>

    </div>
  </div>

  <?php require_once("../Layout/footer.php") ?>

</body>

</html>