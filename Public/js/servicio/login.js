const form = document.getElementById("formulario");
const user = document.getElementById('user');
const pass = document.getElementById('pass');
const btnLogin = document.getElementById('btnLogin');

const Expresiones = {
  user:/^[a-zA-Z0-9\_\-]{3,10}$/,
  pass:/^[a-zA-Z0-9]{6,10}$/,
}

const Campos = {
  user: false,
  pass: false
}

let datos = {
  accion: 'ingresar',
  user:   null,
  pass:   null
}

const valBtn = () => {
  if (Campos.user == true && Campos.pass == true) {
    btnLogin.removeAttribute("disabled");
    
  } else {    
    btnLogin.setAttribute("disabled", "");
  }
}

const valPass = () => {
  if (Expresiones.pass.test(pass.value)) {
    Campos['pass'] = true;
    datos['pass']  = pass.value;
  } else {
    Campos['pass'] = false;
    datos['pass']  = null
  }
}

const valUser = () => {
  if (Expresiones.user.test(user.value)) {
    Campos['user'] = true;
    datos['user']  = user.value;
  } else {
    Campos['user'] = false;
    datos['user']  = null;
  }
}

const Login = (datos) => {
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/LoginModel.php",
    data: { datos },
    beforeSend: function () {
      btnLogin.innerText = "Validando";
    },
    success: function (data) {

      btnLogin.innerText = "Iniciar Sesión";
      if (data == 0) {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Usuario o contraseña incorecta.',
          showConfirmButton: true
        });
      } else if (data[0]['tipo_userid'] == 1) {
        window.location="../AdminView/";
      } else if (data[0]['tipo_userid'] == 2) {
        window.location="../AbogadoView/";
      } else if (data[0]['tipo_userid'] == 3) {
        window.location="../ClienteView/";
      } 
        
      
    },
    error: function () {
      btnLogin.innerText = "Iniciar Sesión";
      console.log("No se ha podido obtener la información");
    },
  });

}

const LimpiarCampos = () => {
  Campos['pass'] = false;
  Campos['user'] = false;

  datos['pass'] = null;
  datos['user'] = null;
}

pass.addEventListener("keyup", valPass);
pass.addEventListener("blur", valPass);

user.addEventListener("keyup", valUser);
user.addEventListener("blur", valUser);

user.addEventListener("keyup", valBtn);
pass.addEventListener("keyup", valBtn);

form,addEventListener("submit", (e) => {
  e.preventDefault();
  if (Campos.user == true && Campos.pass == true) {
    Login(datos);
    btnLogin.setAttribute("disabled", "");
    LimpiarCampos();
    form.reset();
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Advertencia',
      text: 'Por favor complete el formulario.',
      showConfirmButton: true
    });
  }
  
});