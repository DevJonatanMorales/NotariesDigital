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
  <link rel="stylesheet" type="text/css" href="../../css/servicios/registrate.css">
  <link rel="icon" href="../../img/IncoND.png">
</head>

<body>
  <!=====================Comentario de la Aqui llamamos a menu=====================->
    <?php 
		$link = "registrate";
		require_once("../Layout/servicios.php"); 
	?>

    <div class="container">
      <form id="formulario" class="col-sm-12 col-md-8 p-2 fondoDos mx-auto mt-4 mb-4 text-white rounded"
        autocomplete="off">
        <h1 class="text-center border-bottom p-1">Crear Cuenta</h1>

        <div class="row">
          <!-- Grupo: Usuario -->
          <div class="formulario__grupo col-sm-6" id="grupo__usuario">
            <label for="usuario" class="formulario__label">Usuario</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="John123">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El usuario tiene que ser de 3 a 10 dígitos y solo puede contener numeros,
              letras y guion bajo.</p>
          </div>

          <!-- Grupo: Nombre -->
          <div class="formulario__grupo col-sm-6" id="grupo__nombre">
            <label for="nombre" class="formulario__label">Nombre</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Nombres">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Por favor Ingrese sus dos nombres completos</p>
          </div>

        </div>

        <div class="row">
          <!-- Grupo: Apellido -->
          <div class="formulario__grupo col-sm-6" id="grupo__apellido">
            <label for="apellido" class="formulario__label">Apellido</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="apellido" id="apellido" placeholder="Apellidos">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Por favor ingrese sus apellidos completos</p>
          </div>

          <!-- Grupo: Genero -->
          <div class="formulario__grupo col-sm-6" id="grupo__genero">
            <label for="nombre" class="formulario__label">Genero</label>
            <div class="formulario__grupo-input">
              <select class="formulario__input" name="genero" id="genero">
                <option value="0">Genero</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
              </select>
            </div>
            <p class="formulario__input-error">Por favor Ingrese sus dos nombres</p>
          </div>

        </div>

        <div class="row">
          <!-- Grupo: Fecha de nacimiento -->
          <div class="formulario__grupo col-sm-6" id="grupo__apellido">
            <label for="fecha" class="formulario__label">Fecha de nacimiento</label>
            <div class="formulario__grupo-input">
              <input type="date" class="formulario__input" name="fecha" id="fecha">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Por favor ingrese sus apellidos completos</p>
          </div>

          <!-- Grupo: Correo Electronico -->
          <div class="formulario__grupo col-sm-6" id="grupo__correo">
            <label for="correo" class="formulario__label">Correo Electrónico</label>
            <div class="formulario__grupo-input">
              <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion
              bajo.</p>
          </div>

        </div>

        <!-- Grupo: direccion -->
        <div class="formulario__grupo" id="grupo__correo">
          <label for="direccion" class="formulario__label">Direccion</label>
          <div class="formulario__grupo-input">
            <textarea class="form-control" id="direccion" rows="3"></textarea>
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion
            bajo.</p>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-dark mt-4 d-block mx-auto">
            Crear Cuenta
          </button>
        </div>
      </form>

    </div>

    <! -=========================================Aqui se llama al pie de pag=========================================->
      <?php 
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
      <script src="../../js/servicio/CrearCuenta.js"></script>
</body>

</html>