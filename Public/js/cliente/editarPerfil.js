/** 
*
* Comentario: Se muestran lod datos del usuario
*
**/
const calculateAge = (birthday) => {
  let birthday_arr  = birthday.split("-");
  let birthday_date = new Date(birthday_arr[0], birthday_arr[1] - 1, birthday_arr[2]);
  let ageDifMs      = Date.now() - birthday_date.getTime();
  let ageDate       = new Date(ageDifMs);
  return Math.abs(ageDate.getUTCFullYear() - 1970);
}

let _datos = {
  accion:       'editar',
  user:      null,
  telefono:  null,
  correo:     null,
  direccion: null
}

const MostrarPerfil = () => {
  const datos = {
    accion: 'mostrar'
  }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/perfilUserModel.php",
    data: {datos},
    success: function (data) {

      _datos['user']      = data[0]['user'];
      _datos['telefono']  = data[0]['telefono'];
      _datos['correo']     = data[0]['email'];
      _datos['direccion'] = data[0]['direccion'];

      document.getElementById("user").value      = data[0]['user'];
      document.getElementById("telefono").value  = data[0]['telefono'];
      document.getElementById("correo").value     = data[0]['email'];
      document.getElementById("direccion").value  = data[0]['direccion'];
    },
    error: function () {
      console.log("No se ha podio obtener la informacion");
    }
  });
}

window.addEventListener("onload", MostrarPerfil());
/** 
*
* Comentario: Se Actualizan lo datos
*
**/
const form          = document.getElementById('formulario');
const inputs        = document.querySelectorAll('#formulario input');
const txtDireccion  = document.getElementById('direccion');

const FormularioValido = (campo) => {
  document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
  document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
  document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
  document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
  document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
}
/* - Comentario Si el formulario es incorrecto - */
const FormularioInValido = (campo) => {
  document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
  document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
  document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
  document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
  document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
}

const MostrarAlerta = (msj) => {
  Swal.fire({
    type: 'warning',
    title: 'Advertencia',
    text: msj,
    showConfirmButton: true
  });
}

const Expresiones = {
	user:     /^[a-zA-Z0-9\_\-]{3,10}$/,
  telefono: /^[0-9]{8,14}$/,
  correo:   /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
};

let Campos = {
  user:      true,
  telefono:  true,
  correo:    true,
  direccion: true
};

const ValidarCampo = (expresiones, input, campo) => {

  if (expresiones.test(input.value)) {  
    FormularioValido(campo);
    Campos[campo] = true;  
    _datos[campo] = input.value;
  } else {
    FormularioInValido(campo);
    _datos[campo] = null;
    Campos[campo] = false;
  }
  
}

const ValidarFormulario = (e) => {

  switch (e.target.name) {
    case "user":
      ValidarCampo(Expresiones.user, e.target , 'user');
      break;

    case "telefono":
      ValidarCampo(Expresiones.telefono, e.target, 'telefono');
      break;

    case "correo":
      ValidarCampo(Expresiones.correo, e.target, 'correo');
      break;
    case "direccion":
      ValidarCampo(Expresiones.direccion, e.target, 'direccion');
      break;
  }
  
}

const ValidarTexteArea = () => {

  if (txtDireccion.value.length < 50 || txtDireccion.value == "") {
    FormularioInValido('direccion');
    Campos['direccion'] = false;  
    _datos['direccion'] = null;
  } else {
    FormularioValido('direccion');
    Campos['direccion'] = true;  
    _datos['direccion'] = txtDireccion.value;
  }
}

inputs.forEach((input) => {
  input.addEventListener("keyup", ValidarFormulario);
  input.addEventListener("blur",  ValidarFormulario);
});

txtDireccion.addEventListener("keyup", ValidarTexteArea);
txtDireccion.addEventListener("click", ValidarTexteArea);

const Actualizar = (datos) => {

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/perfilUserModel.php",
    data: {datos},
    success: function (data) {

      if (data.result == 1) {
        MostrarPerfil()
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Datos actualizados con exito.',
          showConfirmButton: true
        });
      } else {
        MostrarAlerta("Error al actualizar los datos");        
      }

    },
    error: function () {
      console.log("No se ha podio obtener la informacion");
    }
  });

}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  if (
    Campos.user      == false ||
    Campos.telefono  == false ||
    Campos.correo    == false ||
    Campos.direccion == false
  ) {
    MostrarAlerta("Por favor complete el formulario.");
  } else {
    Actualizar(_datos);
      document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
      icono.classList.remove('formulario__grupo-correcto');});
  }
  
});
