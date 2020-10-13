<!DOCTYPE html>
<html lang="en">

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
  <link rel="stylesheet" type="text/css" href="../../css/servicios/registrate.css">
  <link rel="icon" href="../../img/IncoND.png">
</head>

<body>
  <?php 
		$link = "login";
		require_once("../Layout/servicios.php"); 
	?>

  <form id="formulario" class="col-sm-12 col-md-6 p-2 fondoDos mx-auto mt-4 mb-4 text-white rounded" autocomplete="off">
    <h1 class="text-center border-bottom p-1">Recuperar Contraseña</h1>

    <div class="row my-4">
      <div class="formulario__grupo col-sm-12" id="grupo__correo">
        <label for="correo" class="formulario__label OpenSans">Correo Electrónico</label>
        <div class="formulario__grupo-input">
          <input type="email" class="formulario__input" name="correo" id="correo"
            placeholder="Por favor ingrese su correo electrónico">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error" id="infoCorreo"></p>
      </div>
    </div>

    <button type="submit" id="btnCorreo" onkeyup="ValidarCorreo()" class="btn btn-dark mx-auto d-block mb-2"
      disabled="disabled">
      Recuperar Contraseña
    </button>
  </form>

  <?php 
    $footer = 'fixed-bottom';
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
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <script src="../../js/servicio/recuperarPass.js"></script>
</body>

</html>