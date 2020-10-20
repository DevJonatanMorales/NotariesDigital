const MostrarPerfil = () => {
  const datos = {
    accion: 'mostrar'
  }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/perfilUserModel.php",
    data: {datos},
    success: function (data) {
      console.log(data);
      document.getElementById("txtUser").innerHTML = `Usaurio: ${data[0]['user']}`;
      document.getElementById("txtNombre").innerHTML = `Nombre: ${data[0]['nombres']}`;
      document.getElementById("txtApellido").innerHTML = `Apellido: ${data[0]['apellidos']}`;
      document.getElementById("txtGenero").innerHTML = `Genero: ${data[0]['genero']}`;
      document.getElementById("txtEdad").innerHTML = `Edad: ${data[0]['fech_naci']}`;
      document.getElementById("txtTelefono").innerHTML = `Telefono: ${data[0]['telefono']}`;
      document.getElementById("txtEmail").innerHTML = `Correo: ${data[0]['email']}`;
      document.getElementById("txtDireccion").innerHTML = `Direccion: ${data[0]['direccion']}`;
    },
    error: function () {
      console.log("No se ha podio obtener la informacion");
    }
  });
}

window.addEventListener("onload", MostrarPerfil());