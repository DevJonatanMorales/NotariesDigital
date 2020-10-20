<div class="sidebar-heading Broadway bg-dark">Notaries Digital</div>
<div class="card bg-dark" style="width: 15rem; ">
  <div id="contener-foto-user" class="foto contener-foto-user my-4">
    <img src="../../img/<?php echo $_SESSION['FOTO_USER']; ?>" class="bg-white perfilUser rounded" alt="Error"
      width="90px" height="95px">
  </div>
</div>
<div class="list-group list-group-flush">

  <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans">
    <i class="fas fa-home"></i> Inicio
  </a>

  <a href="cambiarFoto.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans">
    <i class="fas fa-camera"></i> Cambiar Foto
  </a>

  <a href="miPerfil.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans">
    <i class="fas fa-user"></i> Mi perfil
  </a>

  <a href="editarPerfil.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans">
    <i class="fas fa-user-edit"></i> Editar perfil
  </a>

  <a href="cambiarClave.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans">
    <i class="fas fa-user-cog"></i> Cambiar contraseña
  </a>

  <a href="#" class="list-group-item list-group-item-action bg-dark text-white Open-Sans" id="btnExit">
    <i class="fas fa-power-off"></i> Cerrar sesión
  </a>

</div>
</div>