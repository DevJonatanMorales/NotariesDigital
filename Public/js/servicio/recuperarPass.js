const form = document.getElementById("formulario");
const txtCorreo = document.getElementById("correo");
const btnCorreo = document.getElementById("btnCorreo");
/* - Comentario Expresion regular para validar el correo - */
const ExprecionCorreo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
/* - Comentario Si es formulario es correcto - */
const FormularioValido = () => {
  document.querySelector(`#grupo__correo .formulario__input-error`).classList.remove("formulario__input-error-activo");
  document.getElementById(`grupo__correo`).classList.remove("formulario__grupo-incorrecto");
  document.querySelector(`#grupo__correo i`).classList.remove("fa-times-circle");
};
/* - Comentario Si es invalido el formulario - */
const FormularioInValido = (msj) => {
  document.getElementById(`grupo__correo`).classList.remove("formulario__grupo-correcto");
  document.getElementById(`grupo__correo`).classList.add("formulario__grupo-incorrecto");
  document.querySelector(`#grupo__correo i`).classList.add("fa-times-circle");
  document.querySelector(`#grupo__correo i`).classList.remove("fa-check-circle");
  document.querySelector(`#grupo__correo .formulario__input-error`).classList.add("formulario__input-error-activo");
  document.getElementById("infoCorreo").innerHTML = "";
  document.getElementById("infoCorreo").innerHTML = msj;
};

let datoUser = {
  accion: "recuperarPass",
  userID: null,
  nombre: null
};
/* - Comentario: Funcion encargar de buscar el correo - */
const BuscarCorreo = (input) => {
  let datos = {
    accion: "buscarCorreo",
    input: input,
  };

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/recuperarPassModel.php",
    data: { datos },
    success: function (data) {
      console.log(data);
      if (data == 0) {
        FormularioInValido("El correo no existe");
        btnCorreo.setAttribute("disabled", "");
      } else {
        FormularioValido();
        btnCorreo.removeAttribute("disabled");
        datoUser['nombre'] = data.nombres;
        datoUser['userID'] = data.usuario_id;
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

let estadoCorreo = false;
/** - Comentario: Se valida que lo que escribe sea un correo - **/
const ValidarCorreo = () => {
  if (ExprecionCorreo.test(txtCorreo.value)) {
    estadoCorreo = true;
    BuscarCorreo(txtCorreo.value);
    FormularioValido();
  } else {
    FormularioInValido(
      "El correo solo puede contener letras, numeros, puntos, guiones y guion bajo."
    );
    estadoCorreo = false;
  }
};
/** - Comentario: Se ejecuta la funcion - **/
txtCorreo.addEventListener("keyup", ValidarCorreo);

const RecuperarPass = (datos) => {
  // console.log(`Los datos que se enviaran son: ${datos}`);
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/recuperarPassModel.php",
    data: { datos },
    dataType: "json",
    beforeSend: function () {
      btnCorreo.innerText = "Enviando correo...";
    },
    success: function (data) {
      // console.log(`Valor de data: ${data}`);
      btnCorreo.innerText = "Recuperar Contraseña";
      if (data == 1) {
        Swal.fire({
          type: 'success',
          title: 'Se ha enviado un mensaje a su correo con las instruciones para que pueda cambiar su contraseña',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Ocurrio un Error, por favor vuelva a intentar',
          showConfirmButton: true
        });
      }
     
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });

};

form.addEventListener("submit", (e) => {
  e.preventDefault();
  FormularioValido();
  btnCorreo.setAttribute("disabled", "");
  form.reset();
  if (estadoCorreo == true) {
    RecuperarPass(datoUser);
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Ocurrio un Error, por favor vuelva a intentar',
      showConfirmButton: true
    });
  }
});
