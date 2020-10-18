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
  } else {
    Campos['pass'] = false;
  }
}

const valUser = () => {
  if (Expresiones.user.test(user.value)) {
    Campos['user'] = true;
  } else {
    Campos['user'] = false;
  }
}

const Login = () => {
  const datos = {
    accion: 'ingresar',
    user: user.value,
    pass:pass.value
  }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/loginModel.php",
    data: { datos },
    beforeSend: function () {
      btnLogin.innerText = "Validando...";
    },
    success: function (data) {
      console.log(data);
      btnLogin.innerText = "Iniciar Sesión";
      
      if (data['tipo_userid'] == 1) {
        window.location="../AdminView/";
      } else if (data['tipo_userid'] == 2) {
        window.location="../AbogadoView/";
      } else if (data['tipo_userid'] == 3) {
        window.location="../ClienteView/";
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Usuario o contraseña incorecta',
          showConfirmButton: true
        });
      }
      
    },
    error: function () {
      btnLogin.innerText = "Iniciar Sesión";
      console.log("No se ha podido obtener la información");
    },
  });

}

pass.addEventListener("keyup", valPass);
pass.addEventListener("blur", valPass);

user.addEventListener("keyup", valUser);
user.addEventListener("blur", valUser);

user.addEventListener("keyup", valBtn);
pass.addEventListener("keyup", valBtn);

form,addEventListener("submit", (e) => {
  e.preventDefault();
  Login();
  form.reset();
});