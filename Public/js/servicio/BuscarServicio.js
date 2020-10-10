let buscarServicio = document.getElementById("buscar");

const BuscarServicio = () => {
  let datos = {
    accion: "buscar",
    sql: buscarServicio.value,
  };
  let layout = "";
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/BuscarServicio.php",
    data: { datos },
    success: function (result) {
      $("#tbody").html("");
      if (result == 0) 
      {
        layout += `<tr>
                    <td>No hay datos que coincidan.</td>
                  </tr>`;
        $("#tbody").html(layout);
      } 
      else 
      {     
        const datos = JSON.parse(result);
        datos.forEach((datos) => {
          layout += `<tr>
                      <td style="width: 250px" >${datos.nom_servicio}</td>
                      <td style="width: 155px" >${datos.categoria}</td>
                      <td style="width: 650px" >${datos.des_servicio}</td>
                    </tr>`;
          $("#tbody").html(layout);
        });
      }      
      
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

const MostrarServicio = () => {
  let layout = "";
  let datos = {
    accion: "mostrar",
  };
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/BuscarServicio.php",
    data: { datos },
    before: function () {
      $("#tbody").html("Cargando datos...");
    },
    success: function (result) {
      // console.log(`valor de la result MostrarServicio es: ${result}`);
      const datos = JSON.parse(result);
      datos.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 250px" >${datos.nom_servicio}</td>
                    <td style="width: 155px" >${datos.categoria}</td>
                    <td style="width: 650px" >${datos.des_servicio}</td>
                  </tr>`;
      });

      $("#tbody").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

buscarServicio.addEventListener("keyup", BuscarServicio);

window.addEventListener("load", MostrarServicio);

// CARGAR VENTANA MODAL
$(function() {
  $(document).on('click', 'button[type="button"]', function(event) {//al hacer click en el boton
    let id = this.id;//obtengo el valor del id, el id tiene q tener el nombre del archivo
    //console.log("Se presionó el Boton con ID: "+ id)//mostrar el ID de botton
    $('.modal-content').load("./ventanaModal.php?modelId="+id ,function(){//llamo al archivo q tiene el contenido
      console.log(id);
      $('#myModal').trigger('focus');
    });
  });
});
