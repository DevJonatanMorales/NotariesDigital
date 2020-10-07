const form = document.getElementById("formulario");
const usuario = document.getElementById("user");

const BuscarUser = () => {
  let datos = {
    accion: "buscarUser",
    sql: usuario.value,
  };

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/LoginModels/LoginModel.php",
    data: { datos },
    success: function (data) {
      if (data == 0) {
        console.log("usuario disponivel");
      } else {
        console.log("usuario no disponivel");
      }
      // console.log(`valor de la data: ${data}`);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

// validamos que el usuario que ingrese este diisponivel en
usuario.addEventListener("keyup", BuscarUser);
usuario.addEventListener("blur", BuscarUser);
