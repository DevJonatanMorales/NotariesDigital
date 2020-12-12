/** 
*
* Comentario Cargar abogados
*
**/
console.log('archivo conectado');
const Mostrar = () => {
  let datos = {
    accion: 'mostrar'
  }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/mostrarAbogados.php",
    data: {datos},
    success: function (responce) {
      console.log(responce);
    },
    error: function () {
      console.log('No se ha podido obtenier la informacions');
    }
  })

}

window.addEventListener('onload', Mostrar);