<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
</head>

<body>
  <?php 
    $link = "perfil";
    require_once('../Layout/abogadoMenu.php');
  ?>
  <div class="container my-4">
    <div class="card col-ms-12 col-md-8 mx-auto my-4 sombre">
      <div class="card-header text-center">
        <h5 class="card-title my-auto">Mi Perfil</h5>
      </div>
      <div class="card-body">
        <img src="../../img/<?php echo $_SESSION['FOTO_USER']; ?>" class="card-img-top border mx-auto d-block"
          alt="Error al cargar" style="max-width: 14rem;">

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
          <p class="card-text col-sm-12 col-md-6" id="txtDireccion"></p>
        </div>

        <a href="editarPerfil.php" class="btn btn-dark">Editar perfil</a>
      </div>
    </div>
  </div>


  <script src="../../js/abogado/app.js"></script>
  <script src="../../js/abogado/miPerfil.js"></script>
</body>

</html>