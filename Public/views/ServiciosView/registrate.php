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
		$link = "registrate";
		require_once("../Layout/servicios.php"); 
	?>

  <div class="container">
    <form id="formulario" class="col-sm-12 col-md-5 p-2 fondoDos mx-auto mt-4 text-white rounded">
      <h1 class="text-center ">Crear Cuenta</h1>
      <div class="row">
        <div class="form-group col-sm-12 col-md-6">
          <label for="nombre">Nombres</label>
          <input type="text" id="nombre" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-6">
          <label for="apellido">Apellidos</label>
          <input type="text" id="apellido" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="fomr-grupo col-sm-12 col-md-6">
          <label for="genero">Genero</label>
          <select class="form-control" id="genero">
            <option value='0'>Genero</option>
            <option value='femenino'>Femenino</option>
            <option value='masculino'>Masculino</option>
          </select>
        </div>
        <div class="form-group col-sm-12 col-md-6">
          <label for="apellido">Fecha de nacimiento</label>
          <input type="date" id="apellido" class="form-control">
        </div>
      </div>


      <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" id="correo" class="form-control">
      </div>
      <div class="form-group">
        <label for="dir">Direccion</label>
        <textarea class="form-control" id="dir" rows="3"></textarea>
      </div>
      <div class="form-gruop">
        <button type="submit" class="btn btn-dark d-block mx-auto text-white">
          Crear Cuenta
        </button>
      </div>
    </form>

  </div>


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