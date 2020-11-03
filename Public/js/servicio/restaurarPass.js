/** 
*
* Comentario: Se buscar los datos
*
**/
const form = document.getElementById('formulario');
const txtCodigo = document.getElementById('codigo');
const txtNewPass = document.getElementById('newPass');
const txtConfPass = document.getElementById('confPass');
const btn = document.getElementById('btn');
/* - Comentario: Cards - */
const cardError = document.getElementById('Error');
const cardErrorTime = document.getElementById('ErrorTime');

let ParametrosUser = {
  userId: null,
  codigo: null,
  fecha: null
}
/* - Comentario: Funcion que recupera la variable GET - */
const getParameterByName = (name) => {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  let regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
/** - Comentario: Se obtiene la fecha actual - **/
const getFecha = () => {
  let dias = [01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
  let date = new Date();
  let d = date.getDate();
  let m = (date.getMonth() + 1);
  let y = date.getFullYear();
  return `${y}-${m}-${d}`;
}

const BuscarUser = (_id) => {
  let datos  = {
    accion: "valUser",
    userId: _id
  }
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/restaurarPass.php",
    data: { datos },
    success: function (data) { 

      if (data == 0) {
        cardErrorTime.classList.add('ocultar');
        form.classList.add('ocultar');
        cardError.classList.remove('ocultar');
      } else {        
        ParametrosUser['userId'] = data['userID'];
        ParametrosUser['codigo'] = data['codigo'];
        ParametrosUser['fecha']  = data['fecha'];

        if (data['fecha'] == true) {
          cardErrorTime.classList.add('ocultar');
          cardError.classList.add('ocultar');
          form.classList.remove('ocultar');
        } else {
          form.classList.add('ocultar');
          cardError.classList.add('ocultar');
          cardErrorTime.classList.remove('ocultar');
        }
        
      }
      
      // console.log(`fecha DB ${data[0]['fech_pass']}, fecha Actual ${getFecha()}`)
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
}

window.onload = () => {  
  let _id = getParameterByName('_id');
  if(_id == "") {
    cardErrorTime.classList.add('ocultar');
    form.classList.add('ocultar');
    cardError.classList.remove('ocultar');
  } else {
    BuscarUser(_id);    
  }
}
/** 
*
* Comentario: 
*
**/
const filtro = /^[a-zA-Z0-9]{6,10}$/;

let Campos = {
  codigo: false,
  newPass: false,
  confPass: false
}

let datos = {
  accion: 'restaurarPass',
  id: null,
  pass: null
}

const ValNewPass = () => {
  if (filtro.test(txtNewPass.value)) {
    Campos['newPass'] = true
  } else {
    Campos['newPass'] = false    
  }
}

const ValConfPass = () => {
  if (filtro.test(txtConfPass.value)) {
    Campos['confPass'] = true;
    datos['pass'] = txtConfPass.value;
    datos['id'] = ParametrosUser.userId;
  } else {
    Campos['confPass'] = false    
  }
}

const Condigo = () => {
  if (filtro.test(txtCodigo.value)) {
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
}

txtCodigo.addEventListener("keyup", Condigo);
txtCodigo.addEventListener("blur", Condigo);

txtNewPass.addEventListener("keyup", ValNewPass);
txtNewPass.addEventListener("blur", ValNewPass);

txtConfPass.addEventListener("keyup", ValConfPass);
txtConfPass.addEventListener("blur", ValConfPass);

txtCodigo.addEventListener("keyup", ValForm);
txtNewPass.addEventListener("keyup", ValForm);
txtConfPass.addEventListener("keyup", ValForm);

const RestaurarPass = (datos) => {
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/restaurarPass.php",
    data: {datos},
    beforeSend: function () {
      btn.innerHTML = "Restaurando Contraseña";
    },
    success: function (data) {
      btn.innerHTML = "Restaurar Contraseña";

      if (data.result == 1) {
        Swal.fire({
          title: 'Exito',
          type: 'success',
          text: "Su contraseña fue actualizada con exito.",
          showCancelButton: false,
          confirmButtonText: 'Aceptar'
        }).then((result) => {
          if (result.value) {
            location.href="login.php";
          }    
        })
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Ha ocurrido un error, por favor inténtelo de nuevo más tarde',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      btn.innerHTML = "Restaurar Contraseña";
      console.log('Error no se pudo obtener los datos');
    }
  })
}

const LimpiarCampos = () => {
  Campos['codigo'] = false;
  Campos['newPass'] = false;
  Campos['confPass'] = false;

  datos['id'] = null;
  datos['pass'] = null;
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  
  if (Campos.codigo == true && Campos.confPass == true && Campos.newPass == true) {
    if (txtCodigo.value == ParametrosUser.codigo) {
      if (txtNewPass.value == txtConfPass.value) {
        RestaurarPass(datos);
        form.reset();
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'La contraseña no coincide, por favor intente de nuevo.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    } else {
      Swal.fire({
        type: 'warning',
        title: 'Advertencia',
        text: 'EL codigo es incorrecto, por favor intente de nuevo.',
        confirmButtonText: 'aceptar',
        showConfirmButton: true
      });
    }
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Advertencia',
      text: 'Por favor complete el formulario',
      confirmButtonText: 'aceptar',
      showConfirmButton: true
    });
  }
  LimpiarCampos();
});
