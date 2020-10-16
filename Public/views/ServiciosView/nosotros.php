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
              <p>Integridad.</p>
            </li>
            <li>
              <p>Honestidad.</p>
            </li>
            <li>
              <p>Profesionalismo.</p>
            </li>
            <li>
              <p>Calidad.</p>
            </li>
            <li>
              <p>Innovacion.</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="card sombre col-sm-12 col-md-3 mt-0 mb-4 mx-2" style="width: 18rem;">
        <img src="../../img/mision.svg" class="card-img-top m-2" alt="...">
        <div class="card-body">
          <h5 class="card-title">Misión</h5>
          <p class="card-text">Nuestra empresa es una la cual tiene presencia nacional y nos dedicamos a desarrollar y
            comercializar
            aplicaciones web y similares, brindando formas de solucionar los problemas de nuestros usuarios.</p>
        </div>
      </div>

      <div class="card sombre col-sm-12 col-md-3 mt-0 mb-4 mx-2" style="width: 18rem;">
        <img src="../../img/vision.svg" class="card-img-top m-2" alt="...">
        <div class="card-body">
          <h5 class="card-title">Visión</h5>
          <p class="card-text">Ser la mejor empresa a nivel nacional en el desarrollo y comercialización de
            aplicaciones web y similares,
            buscando ser el número uno en innovación y ventas.</p>
        </div>
      </div>

    </div>
  </div>

  <?php require_once("../Layout/footer.php") ?>

</body>

</html>