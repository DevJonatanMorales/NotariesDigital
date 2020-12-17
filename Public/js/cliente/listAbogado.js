/** 
*
* Comentario Mostrar
*
**/
const MostrarClientes = () => {
  let layout = "";
  let datos = { accion: "mostrar" };
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/listAbogados.php",
    data: { datos },
    before: function () {
      $("#cards").html("");
    },
    success: function (result) {
      $("#cards").html("");
      result.forEach((datos) => {
        layout += `<div class="card sombre mx-1" col-sm-12 col-lg-3 style="width: 18rem;">
                    <img src="../../img/${datos.foto}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">${datos.nombres}</h5>
                      <p class="card-text">Despacho: ${datos.despacho}</p>
                      <button class="btn btn-success" type="submit" id="${datos.abogado_id}">Ver más</button>
                    </div>
                  </div>`;
      });

      $("#cards").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

window.addEventListener("load", MostrarClientes);

/** 
*
* Comentario Ver perfil
*
**/
const calculateAge = (birthday) => {
  let birthday_arr = birthday.split("-");
  let birthday_date = new Date(birthday_arr[0], birthday_arr[1] - 1, birthday_arr[2]);
  let ageDifMs = Date.now() - birthday_date.getTime();
  let ageDate = new Date(ageDifMs);
  return Math.abs(ageDate.getUTCFullYear() - 1970);
}

const Perfil = (id) => {

  let datos = { accion: 'perfil', abogadoId: id };

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/listAbogados.php",
    data: { datos },
    success: function (data) {
      document.getElementById("foto").src = `../../img/${data[0]['foto']}`
      document.getElementById("txtUser").innerHTML = `Usuario: ${data[0]['user']}`;
      document.getElementById("txtNombre").innerHTML = `Nombre: ${data[0]['nombres']}`;
      document.getElementById("txtApellido").innerHTML = `Apellido: ${data[0]['apellidos']}`;
      document.getElementById("txtGenero").innerHTML = `Genero: ${data[0]['genero']}`;
      document.getElementById("txtEdad").innerHTML = `Edad: ${calculateAge(data[0]['fech_naci'])}`;
      document.getElementById("txtTelefono").innerHTML = `Telefono: ${data[0]['telefono']}`;
      document.getElementById("txtEmail").innerHTML = `Correo: ${data[0]['email']}`;
      document.getElementById("txtDespacho").innerHTML = `Despacho: ${data[0]['despacho']}`;
      $('#myModal').modal({show:true});
    },
    error: function () {
      console.log('No se ha podido obtener la información.');
    }
  });
}

$(document).on('click', '.btn', function () {
  let elementId = $(this);
  abogadoId = elementId[0].id;

  Perfil(abogadoId);
});