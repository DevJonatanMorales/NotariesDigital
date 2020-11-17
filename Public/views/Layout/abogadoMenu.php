<nav class="navbar navbar-expand-lg navbar-dark fondo">
  <a class="navbar-brand Broadway text-white" href="#">NOTARIES DIGITAL</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php echo $link == "Inicio"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="index.php">Inicio</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo $link == "perfil"? "active": ''; ?>" href="#" id="navbarDro"
          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Perfil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDro">
          <a class="dropdown-item" href="miPerfil.php">Mi perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="editarPerfil.php">Editar perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="cambiarFoto.php">Cambiar foto</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="cambiarClave.php">Cambiar contraseña</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo $link == "servicio"? "active": ''; ?>" href="#" id="navbarDro"
          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Servicios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDro">
          <a class="dropdown-item" href="poderes.php">Poderes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="asesoria.php">Habla con tu abogado</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sociedades.php">Sociedades</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="contratos.php">Contratos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="historial.php">Historial</a>
        </div>
      </li>
      <li class="nav-item <?php echo $link == "login"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="#" id="btnExit">Salir</a>
      </li>
      <li class="nav-item">
        <a class="navbar-brand" href="#">
          <img src="../../img/<?php echo $_SESSION['FOTO_USER']; ?>" width="30" height="30"
            class="d-inline-block align-top rounded-circle" alt="" loading="lazy">
        </a>
      </li>
    </ul>
  </div>
</nav>