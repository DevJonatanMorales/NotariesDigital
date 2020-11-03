/** 
*
* Comentario: Validacion de los campos
*
**/
const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll('#formulario input');
const textArea = document.getElementById('direccion');
const genero = document.getElementById('genero');
const btnCuenta = document.getElementById('btnCuenta');
/* - Comentario: Expresiones regulares - */
const Expresiones = {
	usuario:/^[a-zA-Z0-9\_\-]{3,10}$/, 
  nombres: /^[a-zA-ZÀ-ÿ]{3,15}(\s)[a-zA-ZÀ-ÿ]{3,15}$/,
  apellidos: /^[a-zA-ZÀ-ÿ]{3,15}(\s)[a-zA-ZÀ-ÿ]{3,15}$/,
  fecha: /^\d{4}-\d{2}-\d{2}$/, 
  telefono: /^[0-9]{8,14}$/,
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
};
/* - Comentario: Resultados por defecto de los campos - */
const Campos = {
  usuario: false,
  nombres: false,
  apellidos: false,
  genero: false,
  fecha: false,
  telefono: false,
  correo: false,
  direccion: false
};
/* - Comentario: Se almacena en un array los datos del usuario - */
let Datos = {
  usuario: null,
  tipoUser: 3,
  nombres: null,
  apellidos: null,
  genero: null,
  fecha: null,
  telefono: null,
  correo: null,
  direccion: null
};
/* - Comentario Si el formulario es correcto - */
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
/* - Comentario validamos los campos - */
const ValidarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {    
    FormularioValido(campo);
    Campos[campo] = true;  
    Datos[campo] = input.value;
  } else {
    FormularioInValido(campo);
    Campos[campo] = false;
  }
}

const ValidarUser = (expresion, input, campo) => {
  
  if (expresion.test(input.value)) {
    /* - Comentario Si esta entre 3 a 10 caracteres - */
    BuscarUser(input, campo);
  } else {
    /* - Comentario Si esta fuera del rango - */
    FormularioInValido(campo);
    document.getElementById(input.id).innerHTML = "";
    document.getElementById(`parafo${input.id}`).innerHTML = "El usuario tiene que ser de 3 a 10 dígitos y solo puede contener numeros, letras y guion bajo.";    
  }
  
}

const BuscarUser = (input, campo) => {
  let datos = {
    accion: "buscarUser",
    query: input.value
  }
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/valUser.php",
    data: { datos },
    success: function (data) {

      if (data == 0) {
        FormularioValido(campo);
        document.getElementById(input.id).innerHTML = "";
        document.getElementById(`parafo${input.id}`).innerHTML = "Usuario disponible.";
        Campos[campo] = true;
        Datos[campo] = input.value;
      } else {
        FormularioInValido(campo);
        document.getElementById(input.id).innerHTML = "";
        document.getElementById(`parafo${input.id}`).innerHTML = "Usuario no disponible.";
        Campos[campo] = false;
      }
           
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });

};

const ValidarFormulario = (e) => {
  
  switch (e.target.name) {
    case "usuario":
      ValidarUser(Expresiones.usuario, e.target , 'usuario');
      break;

    case "nombres":
      ValidarCampo(Expresiones.nombres, e.target, 'nombres');
      break;
    
    case "apellidos":
      ValidarCampo(Expresiones.apellidos, e.target, 'apellidos');
      break;

    case "fecha":
      ValidarCampo(Expresiones.fecha, e.target, 'fecha');
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

const ValGenero = () => {
  if (genero.value != 0) {
    FormularioValido("genero");
    Campos['genero'] = true;
    Datos['genero'] = genero.value;
  } else {
    FormularioInValido("genero");
    Campos['genero'] = false;
  }
};

const ValDireccion = () => {
  if (textArea.value.length > 50 || textArea == "") {
    FormularioValido("direccion");
    Campos['direccion'] = true;
    Datos['direccion'] = textArea.value;
  } else {
    FormularioInValido("direccion");
    Campos['direccion'] = false;
  }
}
/** - Comentario: Funcion que envia los datos al back end - **/
const ProcesarDatos = () => {
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/crearCuentaModel.php",
    data: { Datos },
    beforeSend: function () {
      btnCuenta.innerText = "Creando Cuenta";
    },
    success: function (data) {
      btnCuenta.innerText = "Crear Cuenta";
      if (data == 1) {
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Gracias por registrate en Notaries Digital, verfique su correo.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Ocurrio un Error, por favor vuelva a intentar',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
      
    },
    error: function () {
      btnCuenta.innerText = "Crear Cuenta";
      console.log("No se ha podido obtener la información");
    },
  });
  
}
/** 
*
* Comentario se ejecuta cuando escribe en un input
*
**/
inputs.forEach((input) => {
  input.addEventListener("keyup", ValidarFormulario);
  input.addEventListener("blur", ValidarFormulario);
});

textArea.addEventListener("keyup", ValDireccion);
textArea.addEventListener("click", ValDireccion);

genero.addEventListener("click", ValGenero);
genero.addEventListener("blur", ValGenero);

const LimpiarCampos = () => {
  Campos['usuario']   = false;
  Campos['nombres']   = false;
  Campos['apellidos'] = false;
  Campos['genero']    = false;
  Campos['fecha']     = false;
  Campos['telefono']  = false;
  Campos['correo']    = false;
  Campos['direccion'] = false;

  Datos['usuario']   = null;
  Datos['nombres']   = null;
  Datos['apellidos'] = null;
  Datos['genero']    = null;
  Datos['fecha']     = null;
  Datos['telefono']  = null;
  Datos['correo']    = null;
  Datos['direccion'] = null;
}
/* - Cuando de click en crear cuenta - */
formulario.addEventListener('submit', (e) => {
  e.preventDefault();

  if (Campos.usuario && Campos.nombres && Campos.apellidos && Campos.genero && Campos.fecha && Campos.telefono && Campos.correo && Campos.direccion) {
    ProcesarDatos();
    LimpiarCampos();
    formulario.reset();
    document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
      icono.classList.remove('formulario__grupo-correcto');
    });
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Advertencia',
      text: 'Por favor complete el formulario.',
      confirmButtonText: 'aceptar',
      showConfirmButton: true
    });
  }
});
