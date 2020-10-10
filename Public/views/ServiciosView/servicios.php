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
  <link rel="icon" href="../../img/IncoND.png">
</head>

<body>
  <?php 
    $link = "servicios";
    require_once("../Layout/servicios.php"); 
  ?>

  <div class="container">
    <div class="">
      <div class="p-1 my-4 fondoUno text-white">
        <h1 class="text-center OpenSans m-1">Nuestros Servicios</h1>
      </div>

      <div class="col-sm-12">
        <div class="form-group">
          <p>
            Notaries Digital te ofrece diferentes servicios en las categorías de poderes, habla con tu abogado,
            sociedades
            y contratos, para poder realizar la solicitud de un servicio te invitamos a que crees una cuenta totalmente
            gratis. <a href="registrate.php" class="card-link">Crear cuenta.</a>
          </p>
        </div>

        <div class="form-group col-sm-12 col-md-4 ml-auto">
          <input type="text" id="buscar" class="form-control" placeholder="Buscar servicio por nombre o categoria">
        </div>

        <div class="table-responsive">
          <table class="table table-hover table-fixed">
            <thead class="thead-light">
              <tr>
                <th style="width: 250px" scope="col">Nombre del servicion</th>
                <th style="width: 155px" scope="col">Categoria</th>
                <th style="width: 650px" scope="col">Descripcion</th>
              </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- ventana modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

      </div>
    </div>
  </div>
  </div>

  <! - comentario pie de pagina ->
    <?php 
    //$footer = "fixed-bottom";
    require_once("../Layout/footer.php");
  ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="../../js/servicio/BuscarServicio.js"></script>
    <script src="../../js/jquery-3.4.1.min.js"></script>
</body>

</html>