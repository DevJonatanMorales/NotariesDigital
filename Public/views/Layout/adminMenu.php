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
      <li class="nav-item dropdown <?php echo $link == "abogado"? "active": ''; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Abogados
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="listAbogados.php">Listado</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="regAbogado.php">Agregar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="darBajaAbogado.php">Dar de baja</a>
        </div>
      </li>
      <li class="nav-item dropdown <?php echo $link == "cliente"? "active": ''; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="listClientes.php">Listado</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="darBajaCliente.php">Dar de baja</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo $link == "servicio"? "active": ''; ?>" href="#"
          id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Servicios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="newServicio.php">Nuevo Servicio</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="newArea.php">Nueva Area</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="listServicios.php">Listado</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="horarios.php">Horarios</a>
        </div>
      </li>
      <li class="nav-item <?php echo $link == "login"? "active": ''; ?>">
        <a class="nav-link OpenSans" href="#" id="btnExit">Salir</a>
      </li>
      <li class="nav-item">
        <a class="navbar-brand" href="cambiarFoto.php">
          <img src="../../img/defaul.png" width="30" height="30" class="d-inline-block align-top rounded-circle" alt=""
            loading="lazy">
        </a>
      </li>
    </ul>
  </div>
</nav>