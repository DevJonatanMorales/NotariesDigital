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
		$link = "index";
		require_once("../Layout/servicios.php"); 
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
        <h1 class="text-center OpenSans m-1">Nuestros Servicios</h1>
      </div>

      <div class="col-sm-12">
        <div class="row justify-content-around p-1">
          <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
            <img src="../../img/servicios.svg" class="card-img-top m-2" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Servicios Notariales</h5>
              <p class="card-text">
                Notaries Digital te ofrece servicios en diferentes áreas para que puedas resolver tus problemas al
                alcance de tu mano.
              </p>
              <a href="servicios.php" class="btn bg-dark text-white">Nuestros Servicios</a>
            </div>
          </div>

          <div class="card sombre col-sm-5 mt-0 mb-4" style="width: 18rem;">
            <img src="../../img/HablaConTuAbogado.svg" class="card-img-top m-2" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Consultoria</h5>
              <p class="card-text">
                Notaries Digital pone al alcance de tu mano un sin fin de números de abogados que te darán asesoría en
                cualquier tema o área que desees solo tienes que registrarte ya.
              </p>
              <a href="servicios.php" class="btn bg-dark text-white">Consultoria</a>
            </div>
          </div>
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
  <script src="Public/js/jquery-3.4.1.min.js"></script>
</body>

</html>