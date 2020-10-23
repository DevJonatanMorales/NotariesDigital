const form = document.getElementById('formulario');
const txtCodigo = document.getElementById('codigo');
const txtNewPas = document.getElementById('newPass');
const txtConfPass = document.getElementById('confPass');
const btn = document.getElementById('btn');
/* - Comentario: Cards - */
const cardError = document.getElementById('Error');
const cardErrorTime = document.getElementById('ErrorTime');

const filtro = /^[a-zA-Z0-9]{6,10}$/;

const Campos = {
  codigo: false,
  newPass: false,
  confPass: false
}

const ValNewPass = () => {
  if (filtro.test(txtNewPass)) {
    Campos['newPass'] = true
  } else {
    Campos['newPass'] = false    
  }
}

const ValConfPass = () => {
  if (filtro.test(txtConfPass)) {
    Campos['confPass'] = true
  } else {
    Campos['confPass'] = false    
  }
}

const Condigo = () => {
    if (filtro.test(txtCodigo)) {
    Campos['codigo'] = true
  } else {
    Campos['codigo'] = false    
  }
}

const ValForm = () => {
  if (
    Campos.codigo == true && 
    Campos.confPass == true && 
    Campos.newPass == true
  ) {
    btn.removeAttribute("disabled");
  } else {
    btn.setAttribute("disabled", "");    
  }
  console.log(Campos);
}

txtCodigo.addEventListener("keyup", Condigo);
txtCodigo.addEventListener("blur", Condigo);

txtNewPas.addEventListener("keyup", ValNewPass);
txtNewPas.addEventListener("blur", ValNewPass);

txtConfPass.addEventListener("keyup", ValConfPass);
txtConfPass.addEventListener("blur", ValConfPass);

txtCodigo.addEventListener("keyup", ValForm);
txtNewPas.addEventListener("keyup", ValForm);
txtConfPass.addEventListener("keyup", ValForm);
/** 
*
* Comentario: Se buscar el usuario
*
**/
let ParametrosUser = {
  codigo: null,
  fecha: null
}

const getParameterByName = (name) => {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  let regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

const getFecha = () => {
  let date = new Date();
  let dia = date.getDay();
  let mes = date.getMonth();
  let ano = date.getFullYear()
  return `${ano}-${mes}-${dia}`;
}

const ValFecha = () => {
  if (getFecha > ParametrosUser.fecha ) {
    cardError.classList.add('ocultar');
    form.classList.add('ocultar');
    cardErrorTime.classList.remove('ocultar');
  } else {
    cardError.classList.add('ocultar');
    cardErrorTime.classList.add('ocultar');
    form.classList.remove('ocultar');
  }
  console.log(getFecha());
}

const BuscarUser = (id) => {
  let datos  = {
    accion: "valUser",
    userId: id
  }
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/recuperarPassModel.php",
    data: { datos },
    beforeSend: function () {
      
    },
    success: function (data) {
      if (data == 0) {
        
      } else {
        ParametrosUser['codigo'] = data[0]['codigo_pass'];
        ParametrosUser['fecha'] = data[0]['fech_pass'];
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
}
/*
window.onload = () => {
  let _id = getParameterByName('_id');
  if(_id == "") {
    cardErrorTime.classList.add('ocultar');
    form.classList.add('ocultar');
    cardError.classList.remove('ocultar');
  } else {
    BuscarUser(_id);    
  }
  /*

  let date = new Date();
  let dia = date.getDay();
  let mes = date.getMonth();
  let ano = date.getFullYear()
  console.log(`${ano}-${mes}-${dia}`);
  
}
*/