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
      <li class="nav-item <?php echo $link == "miPerfil"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="miPerfil.php">Mi perfil</a>
      </li>
      <li class="nav-item <?php echo $link == "upPerfil"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="editarPerfil.php">Editar perfil</a>
      </li>
      <li class="nav-item <?php echo $link == "upClave"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="cambiarClave.php">Cambiar contraseña</a>
      </li>
      <li class="nav-item <?php echo $link == "historial"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="historial.php">Historial</a>
      </li>
      <li class="nav-item <?php echo $link == "login"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="#" id="btnExit">Salir</a>
      </li>
      <li class="nav-item">
        <a class="navbar-brand" href="cambiarFoto.php">
          <img src="../../img/<?php echo $_SESSION['FOTO_USER']; ?>" width="30" height="30"
            class="d-inline-block align-top rounded-circle" alt="" loading="lazy">
        </a>
      </li>
    </ul>
  </div>
</nav>