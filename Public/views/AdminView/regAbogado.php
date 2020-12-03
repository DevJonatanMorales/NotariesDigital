<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/servicios/registrate.css">
</head>

<body>
  <?php 
		$link= "abogado";
		require_once("../Layout/adminMenu.php");
	?>

  <div class="container">
    <form id="formulario" class="col-sm-12 col-md-10 col-lg-8 p-2 fondoDos mx-auto mt-4 mb-4 text-white rounded"
      autocomplete="off">
      <h1 class="text-center border-bottom pb-2">Registrar Abogado</h1>

      <div class="row">
        <!-- Grupo: Usuario -->
        <div class="formulario__grupo col-sm-6" id="grupo__usuario">
          <label for="usuario" class="formulario__label OpenSans">Usuario</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="John123">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error" id="parafousuario"></p>
        </div>

        <!-- Grupo: Nombre -->
        <div class="formulario__grupo col-sm-6" id="grupo__nombres">
          <label for="nombres" class="formulario__label OpenSans">Nombres</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="nombres" id="nombres" placeholder="primero segundo">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">Por favor Ingrese sus dos nombres completos, sin incluir guiones o simblos.
          </p>
        </div>

      </div>

      <div class="row">
        <!-- Grupo: Apellido -->
        <div class="formulario__grupo col-sm-6" id="grupo__apellidos">
          <label for="apellidos" class="formulario__label OpenSans">Apellidos</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="apellidos" id="apellidos"
              placeholder="paterno y materno">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">Por favor ingrese sus apellidos completos, sin incluir guiones o simblos.
          </p>
        </div>

        <!-- Grupo: Genero -->
        <div class="formulario__grupo col-sm-6" id="grupo__genero">
          <label for="genero" class="formulario__label OpenSans">Genero</label>
          <div class="formulario__grupo-input">
            <select class="formulario__input" name="genero" id="genero">
              <option value="0">Genero</option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
            </select>
            <i class="formulario__val-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">Por favor seleccion su genero.</p>
        </div>

      </div>

      <div class="row">
        <!-- Grupo: Fecha de nacimiento -->
        <div class="formulario__grupo col-sm-6" id="grupo__fecha">
          <label for="fecha" class="formulario__label OpenSans">Fecha de nacimiento</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="fecha" id="fecha" placeholder="aaaa-mm-dd">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">Por favor ingrese fecha de nacimiento.</p>
        </div>

        <!-- Grupo: Correo Electronico -->
        <div class="formulario__grupo col-sm-6" id="grupo__telefono">
          <label for="telefono" class="formulario__label OpenSans">Teléfono</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="00000000">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El telefono solo puede contener números y el maximo son 14 dígitos .</p>
        </div>

      </div>

      <div class="row">
        <div class="formulario__grupo col-sm-12" id="grupo__correo">
          <label for="correo" class="formulario__label OpenSans">Correo Electrónico</label>
          <div class="formulario__grupo-input">
            <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion
            bajo.</p>
        </div>
      </div>


      <!-- Grupo: direccion -->
      <div class="formulario__grupo" id="grupo__despacho">
        <label for="despacho" class="formulario__label OpenSans">Despacho contable</label>
        <div class="formulario__grupo-input">
          <textarea class="formulario__textarea" name="despacho" id="despacho" rows="3"></textarea>
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Direccion es muy corta.</p>
      </div>

      <div class="form-group">
        <button type="submit" id="btnCuenta" class="btn btn-dark mt-4 d-block mx-auto">
          Agregar
        </button>
      </div>
    </form>
  </div>

  <script src="../../js/admin/app.js"></script>
  <script src="../../js/admin/regAbogado.js"></script>
</body>

</html>