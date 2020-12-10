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
  accion:    'editar',
  user:      null,
  telefono:  null,
  correo:    null,
  despacho:  null
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

      _datos['user']      = data[0]['user'];
      _datos['telefono']  = data[0]['telefono'];
      _datos['correo']    = data[0]['email'];
      _datos['despacho']  = data[0]['despacho'];

      document.getElementById("user").value      = data[0]['user'];
      document.getElementById("telefono").value  = data[0]['telefono'];
      document.getElementById("correo").value    = data[0]['email'];
      document.getElementById("despacho").value  = data[0]['despacho'];
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
const txtDespacho   = document.getElementById('despacho');

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
    confirmButtonText: 'aceptar',
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
  despacho:  true
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
    case "despacho":
      ValidarCampo(Expresiones.despacho, e.target, 'despacho');
      break;
  }
  
}

const ValidarTexteArea = () => {

  if (txtDespacho.value.length < 50 || txtDespacho.value == "") {
    FormularioInValido('despacho');
    Campos['despacho'] = false;  
    _datos['despacho'] = null;
  } else {
    FormularioValido('despacho');
    Campos['despacho'] = true;  
    _datos['despacho'] = txtDespacho.value;
  }
}

inputs.forEach((input) => {
  input.addEventListener("keyup", ValidarFormulario);
  input.addEventListener("blur",  ValidarFormulario);
});

txtDespacho.addEventListener("keyup", ValidarTexteArea);
txtDespacho.addEventListener("click", ValidarTexteArea);

const Actualizar = (datos) => {

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AbogadoModels/editarPerfil.php",
    data: {datos},
    success: function (data) {

      if (data.result == 1) {
        MostrarPerfil()
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Datos actualizados con exito.',
          confirmButtonText: 'aceptar',
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
    Campos.despacho  == false
  ) {
    MostrarAlerta("Por favor complete el formulario.");
  } else {
    Actualizar(_datos);
    document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
    icono.classList.remove('formulario__grupo-correcto');});
  }
  
});
