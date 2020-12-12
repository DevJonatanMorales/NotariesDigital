<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/BigTable.css">
</head>

<body>
  <?php 
		$link= "abogado";
    require_once('../Layout/clienteMenu.php');
	?>
  <div class="container my-4">

    <div class="mx-auto d-block p-1 my-4 fondoUno text-white col-sm-12 col-md-10 col-lg-10">
      <h1 class="text-center OpenSans m-1">Abogados</h1>
    </div>

    <div class="mx-auto d-block col-sm-12 col-md-10 col-lg-10">
      <div class="row d-flex justify-content-around" id="cards"></div>
    </div>

  </div>

  <!--
  !
  ! Comentario de la Model
  !
  -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">Perfil</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card col-ms-12 mx-auto my-4 sombre">
            <div class="card-header text-center">
              <h5 class="card-title my-auto">Mi Perfil</h5>
            </div>
            <div class="card-body">
              <img src="" class="card-img-top border mx-auto d-block" id="foto" alt="Error al cargar"
                style="max-width: 7rem;">

              <div class="row form-group">
                <p class="card-text col-sm-12 col-md-6" id="txtUser"></p>
                <p class="card-text col-sm-12 col-md-6" id="txtNombre"></p>
              </div>

              <div class="row form-group">
                <p class="card-text col-sm-12 col-md-6" id="txtApellido"></p>
                <p class="card-text col-sm-12 col-md-6" id="txtGenero"></p>
              </div>

              <div class="row form-group">
                <p class="card-text col-sm-12 col-md-6" id="txtEdad"></p>
                <p class="card-text col-sm-12 col-md-6" id="txtTelefono"></p>
              </div>

              <div class="row form-group">
                <p class="card-text col-sm-12 col-md-6" id="txtEmail"></p>
                <p class="card-text col-sm-12 col-md-6" id="txtDespacho"></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="../../js/cliente/app.js"></script>
  <script src="../../js/cliente/listAbogado.js"></script>
</body>

</html>