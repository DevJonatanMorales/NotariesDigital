/** 
*
* Comentario: Buscamos la contraseña
*
**/
let claveActual = null

const BuscarCalve = () => {
  const datos = {
    accion: 'buscarPass'
  }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/recuperarPassModel.php",
    data: {datos},
    success: function (data) {
      claveActual = data;
    },
    error: function () {
      console.log("No se ha podio obtener la informacion");
    }
  })
}

window.addEventListener("onload", BuscarCalve());
/** 
*
* Comentario: Cambiamos la contraseña
*
**/
const form = document.getElementById('formulario');

const btnActualizar = document.getElementById('btnActualizar');

const txtClave = document.getElementById('clave');
const txtNewClave = document.getElementById('newClave');
const txtConfClave = document.getElementById('confClave');

const filtro =  /^[a-zA-Z0-9]{6,10}$/;

let Campos = {
  clave: false,
  newClave: false,
  confClave: false
}

let datos = {
  accion: 'cambiarPass',
  clave: null,
  newClave: null,
  confClave: null
}

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

const ValidarFormulario = (campo, valor) => {

  if (filtro.test(valor)) {
    Campos[campo] = true;
    datos[campo] = valor;
    FormularioValido(campo);
  } else {
    Campos[campo] = false;
    datos[campo] = null;
    FormularioInValido(campo);
  }
}

const ValCampos = () => {
  if (Campos.clave == true && Campos.newClave == true && Campos.confClave == true) {
    btnActualizar.removeAttribute("disabled");
  } else {
    btnActualizar.setAttribute("disabled", "");
  }
}

txtClave.addEventListener("keyup", ()=>{ValidarFormulario('clave', txtClave.value)});
txtClave.addEventListener("blur", ()=>{ValidarFormulario('clave', txtClave.value)});

txtNewClave.addEventListener("keyup", ()=>{ValidarFormulario('newClave', txtNewClave.value)});
txtNewClave.addEventListener("blur", ()=>{ValidarFormulario('newClave', txtNewClave.value)});

txtConfClave.addEventListener("keyup", ()=>{ValidarFormulario('confClave', txtConfClave.value)});
txtConfClave.addEventListener("blur", ()=>{ValidarFormulario('confClave', txtConfClave.value)});

txtClave.addEventListener("keyup", ValCampos);
txtNewClave.addEventListener("keyup", ValCampos);
txtConfClave.addEventListener("keyup", ValCampos);

const ActualizarClave = (datos) => {
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/recuperarPassModel.php",
    data: {datos},
    success: function (data) {

      if (data.result == 1) {
        BuscarCalve();
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Datos actualizados con exito.',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al actualizar los datos.',
          showConfirmButton: true
        });       
      }

    },
    error: function () {
      console.log("No se ha podio obtener la informacion");
    }
  })
}

const LimpiarTxt = () => {
  Campos['clave'] = false;
  Campos['newClave'] = false;
  Campos['confClave'] = false;

  datos['clave'] = null;
  datos['newClave'] = null;
  datos['confClave'] = null;
}

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (claveActual == datos.clave) {
    if (datos.newClave == datos.confClave) {
      ActualizarClave(datos);
      LimpiarTxt();
      form.reset();

      document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
      icono.classList.remove('formulario__grupo-correcto');});
    } else {
      Swal.fire({
        type: 'warning',
        title: 'Advertencia',
        text: 'La contraseña nueva no coincide.',
        showConfirmButton: true
      });
    }
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Advertencia',
      text: 'La contraseña actual no coincide.',
      showConfirmButton: true
    });
  }
});