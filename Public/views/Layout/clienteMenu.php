<div class="sidebar-heading Broadway bg-dark">Notaries Digital</div>
<div class="card bg-dark" style="width: 15rem; ">
  <div id="contener-foto-user" class="foto contener-foto-user">
    <img src="../../img/defaul.png" class="bg-white perfilUser rounded" alt="Error" width="90px" height="95px">
    <input type="hidden" id="userID" name="userID" value="1">
    <div id="contener-foto" class="contener-foto">
      <a id="btnActualizar" href="actualizarFoto.php" class="text-white itemFoto Open-Sans my-2"><i
          class="fas fa-camera"></i> actualizar</a>
    </div>
  </div>
  <div class="card-body">
    <div class="d-flex justify-content-around">
      <a href="actualizarDatosPersonales.php" class="bg-dark text-white list-group-item-action text-center py-1"><i
          class="fas fa-user-edit"></i></a>
      <a href="actualizarDatosCuenta.php" class="bg-dark text-white list-group-item-action text-center py-1"><i
          class="fas fa-user-cog"></i></a>
      <a href="#" class="bg-dark text-white list-group-item-action text-center py-1" onclick="cerrarSesion()"><i
          class="fas fa-power-off"></i></a>
    </div>
  </div>
</div>
<div class="list-group list-group-flush">
  <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans"><i
      class="fas fa-home"></i> Inicio</a>
  <a href="misPublicaciones.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans"><i
      class="fas fa-search"></i> Publicaciones</a>
  <a href="notificaciones.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans"><i
      class="fas fa-bell"></i> Notificaciones</a>
  <a href="listAmigos.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans"><i
      class="fas fa-user-friends"></i> Amigos</a>
  <a href="chat.php" class="list-group-item list-group-item-action bg-dark text-white Open-Sans"><i
      class="fas fa-comments"></i> Chat</a>
</div>
</div>
<script src="../../js/cerraSession.js"></script>
<script src="../../js/showFoto.js"></script>