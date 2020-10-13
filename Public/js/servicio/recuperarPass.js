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

let datos = {
  accion: "buscarCorreo",
  input: null,
  estadoCorreo: false,
};

const RecuperarPass = (id) => {
  console.log(`Valor de data: ${id}`);
  let datos = {
    accion: "recuperarPass",
    idUser: id
  };

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/recuperarPassModel.php",
    data: { datos },
    success: function (data) {
      if (data == 0) {
        FormularioInValido("El correo no existe");
        btnCorreo.setAttribute("disabled", "");
      } else {
        FormularioValido();
        btnCorreo.removeAttribute("disabled");
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });

};
/* - Comentario: Funcion encargar de buscar el correo - */
const BuscarCorreo = (datos) => {
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/recuperarPassModel.php",
    data: { datos },
    dataType: "json",
    success: function (data) {
      if (data == 0) {
        FormularioInValido("El correo no existe");
        btnCorreo.setAttribute("disabled", "");
      } else {
        FormularioValido();
        btnCorreo.removeAttribute("disabled");
        RecuperarPass(data.usuario_id);
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};
/** - Comentario: Se valida que lo que escribe sea un correo - **/
const ValidarCorreo = () => {
  if (ExprecionCorreo.test(txtCorreo.value)) {
    datos["input"] = txtCorreo.value;
    datos["estadoCorreo"] = true;
    BuscarCorreo(datos);
    FormularioValido();
  } else {
    FormularioInValido(
      "El correo solo puede contener letras, numeros, puntos, guiones y guion bajo."
    );
    datos["estadoCorreo"] = false;
    datos["sql"] = null;
  }
};
/** - Comentario: Se ejecuta la funcion - **/
txtCorreo.addEventListener("keyup", ValidarCorreo);

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (datos['estadoCorreo'] == true) {
    Swal.fire({
      type: 'success',
      title: 'Gracias por registrate en Notaries Digital, verfique su correo.',
      showConfirmButton: true
    });
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Ocurrio un Error, por favor vuelva a intentar',
      showConfirmButton: true
    });
  }
});
