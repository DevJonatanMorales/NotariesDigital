<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/cliente/menu.css">
</head>

<body>
  <?php 
    $link = "servicio";
    require_once('../Layout/clienteMenu.php');
  ?>

  <div class="container my-4">

    <form class="fondoDos col-sm-12 col-md-8 col-lg-6 p-2 mx-auto my-4 text-white rounded" action="#" method="post"
      id="formulario">
      <h1 class="text-center border-bottom p-1">Agendar cita</h1>

      <div class="form-row">
        <div class="form-group col-6">
          <label for="servicio">Nombre servicio</label>
          <input type="hidden" id="servicio_id">
          <input class="form-control" type="text" id="servicio">
        </div>

        <div class="form-group col-6">
          <label for="servicio">Nombre abogado</label>
          <input type="hidden" id="abogado_id">
          <input class="form-control" type="text" id="abogado">
          <button type="button" class="btn btn-info my-1" data-toggle="modal" data-target="#staticBackdrop">
            Seleccionar abogado
          </button>
        </div>
      </div>

      <div class="form-group">
        <label for="servicio">Fecha;</label>
        <input class="form-control" type="date" id="fecha">
      </div>

      <div class="form-group">
        <label for="servicio">Horario</label>
        <input type="hidden" id="horario_id">
        <input class="form-control" type="text" id="horario">
        <button type="button" class="btn btn-info my-1" data-toggle="modal" data-target="#horarios">
          Seleccionar horario
        </button>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Comentario:</label>
        <textarea class="form-control" id="comentario" rows="3"></textarea>
      </div>

      <div class="form-group">
        <a class="btn btn-danger" href="servicios.php">Cancelar</a>
        <button class="btn btn-dark" type="submit" id="btnGuadarServicio"">
          Agendar cita
        </button>
      </div>
    </form>

  </div>

  <!--
  !
  ! Comentario de la Modal
  !
  -->
  <div class=" modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Lista de abogados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="table-responsive sombre">
                  <table class="table table-hover table-fixed table-striped bg-white">
                    <thead class="thead-dark">
                      <tr>
                        <th style="width: 100px" scope="col">Foto</th>
                        <th style="width: 400px" scope="col">Nombre</th>
                        <th style="width: 210px" scope="col">Opcion</th>
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

      <!--
  !
  ! Comentario: Horario
  !
  -->
      <div class="modal fade" id="horarios" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="horarios" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Horarios</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="table-responsive sombre">
                <table class="table table-hover table-fixed table-striped bg-white">
                  <thead class="thead-dark">
                    <tr>
                      <th style="width: 100px" scope="col">Turno</th>
                      <th style="width: 400px" scope="col">Horario</th>
                      <th style="width: 210px" scope="col">Opcion</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyHorarios">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      <script src="../../js/cliente/app.js"></script>
      <script src="../../js/cliente/agendarCita.js"></script>
</body>

</html>