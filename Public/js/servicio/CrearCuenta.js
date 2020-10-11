/** 
*
* Comentario Validacion de los campos
*
**/
const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll('#formulario input');
const textArea = document.getElementById('direccion');
const genero = document.getElementById('genero');
/* - Comentario Expresiones regulares - */
const Expresiones = {
	usuario:/^[a-zA-Z0-9\_\-]{3,10}$/, 
  nombres: /^[a-zA-ZÀ-ÿ\s]{3,15}[a-zA-ZÀ-ÿ\s]{3,15}$/,
  apellidos: /^[a-zA-ZÀ-ÿ\s]{3,15}[a-zA-ZÀ-ÿ\s]{3,15}$/,
  fecha: /^\d{4}-\d{2}-\d{2}$/, 
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
};
/* - Comentario Resultados por defecto de los campos - */
const Campos = {
  usuario: false,
  nombres: false,
  apellidos: false,
  genero: false,
  fecha: false,
  correo: false,
  direccion: false
}
/* - Comentario validamos los campos - */
const ValidarCampo = (expresion, input, campo) => {
  
  if (expresion.test(input.value)) 
  {
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
    Campos[campo] = true;  
  } 
  else 
  {
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    Campos[campo] = false;
  }
}

const ValidarUser = (expresion, input, campo) => {
  
  if (expresion.test(input.value)) {
    /* - Comentario Si esta entre 3 a 10 caracteres - */
    BuscarUser(input, campo);
  } else {
    /* - Comentario Si esta fuera del rango - */
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
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
    url: "../../../Private/Models/LoginModels/LoginModel.php",
    data: { datos },
    success: function (data) {
      
      if (data == 0) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        document.getElementById(input.id).innerHTML = "";
        document.getElementById(`parafo${input.id}`).innerHTML = "Usuario disponible.";
        Campos[campo] = true;
      } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
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
    document.getElementById(`grupo__genero`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__genero`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__genero i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__genero i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__genero .formulario__input-error`).classList.remove('formulario__input-error-activo');
    Campos['genero'] = true;
  } else {
    document.getElementById(`grupo__genero`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__genero`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__genero i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__genero i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__genero .formulario__input-error`).classList.add('formulario__input-error-activo');
    Campos['genero'] = false;
  }
};

const ValDireccion = () => {
  if (textArea.value.length > 50) {
    document.getElementById(`grupo__direccion`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__direccion`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__direccion i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__direccion i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__direccion .formulario__input-error`).classList.remove('formulario__input-error-activo');
    Campos['direccion'] = true;
  } else {
    document.getElementById(`grupo__direccion`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__direccion`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__direccion i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__direccion i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__direccion .formulario__input-error`).classList.add('formulario__input-error-activo');
    Campos['direccion'] = false;
  }
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
textArea.addEventListener("keyup", ValDireccion);

genero.addEventListener("click", ValGenero);
genero.addEventListener("blur", ValGenero);

formulario.addEventListener('submit', (e) => {
  e.preventDefault();
  //console.log(Campos);
  if (Campos.usuario && Campos.nombres && Campos.apellidos && Campos.genero && Campos.fecha && Campos.correo && Campos.direccion) {
    Swal.fire({
      type: 'success',
      title: 'Gracias por registrate en Notaries Digital :)',
      showConfirmButton: true
      // timer: 1500
    });
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Por favor complete el formulario.',
      showConfirmButton: true
      // timer: 1500
    });
  }
})
