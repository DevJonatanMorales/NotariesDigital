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

    <form class="fondoDos col-sm-12 col-md-8 col-lg-5 p-2 mx-auto my-4 text-white rounded" action="#" method="post"
      id="formulario">
      <h1 class="text-center border-bottom p-1">Agendar cita</h1>

      <div class="form-group">
        <label for="servicio">Nombre servicio</label>
        <input class="form-control" type="text" id="servicio">
      </div>

      <div class="form-group">
        <label for="servicio">Nombre abogado</label>
        <input class="form-control" type="text" id="servicio">
        <button type="button" class="btn btn-success my-1" data-toggle="modal" data-target="#staticBackdrop">
          Seleccionar abogado
        </button>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Comentario:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="form-group">
        <button class="btn btn-dark" type="submit" id="btnGuadarServicio" disabled="disabled">
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

  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Cargando...
        </div>
      </div>
    </div>
  </div>

  <script src="../../js/cliente/app.js"></script>
  <script src="../../js/cliente/agendarCita.js"></script>
</body>

</html>