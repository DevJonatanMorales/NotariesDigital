<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- alertas -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notaries Digital</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <link rel="icon" href="Public/img/IncoND.png">
</head>

<body>
  <?php 
    $link = "nosotros";
    require_once("../Layout/servicios.php"); 
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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="../../js/jquery-3.4.1.min.js"></script>
</body>

</html>