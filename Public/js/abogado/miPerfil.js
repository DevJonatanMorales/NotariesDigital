const calculateAge = (birthday) => {
  let birthday_arr = birthday.split("-");
  let birthday_date = new Date(birthday_arr[0], birthday_arr[1] - 1, birthday_arr[2]);
  let ageDifMs = Date.now() - birthday_date.getTime();
  let ageDate = new Date(ageDifMs);
  return Math.abs(ageDate.getUTCFullYear() - 1970);
}

const MostrarPerfil = () => {
  const datos = {
    accion: 'mostrar'
  }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AbogadoModels/mostrarPerfil.php",
    data: {datos},
    success: function (data) {
      document.getElementById("txtUser").innerHTML = `Usuario: ${data[0]['user']}`;
      document.getElementById("txtNombre").innerHTML = `Nombre: ${data[0]['nombres']}`;
      document.getElementById("txtApellido").innerHTML = `Apellido: ${data[0]['apellidos']}`;
      document.getElementById("txtGenero").innerHTML = `Genero: ${data[0]['genero']}`;
      document.getElementById("txtEdad").innerHTML = `Edad: ${calculateAge(data[0]['fech_naci'])}`;
      document.getElementById("txtTelefono").innerHTML = `Telefono: ${data[0]['telefono']}`;
      document.getElementById("txtEmail").innerHTML = `Correo: ${data[0]['email']}`;
      document.getElementById("txtDespacho").innerHTML = `Despacho: ${data[0]['despacho']}`;
    },
    error: function () {
      console.log("No se ha podio obtener la informacion");
    }
  });
}

window.addEventListener("onload", MostrarPerfil());