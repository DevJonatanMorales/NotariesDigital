<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php");  ?>
</head>

<body>
  <?php 
    $link = "servicios";
    require_once("../Layout/serviciosMenu.php"); 
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

    <script src="../../js/servicio/BuscarServicio.js"></script>
</body>

</html>