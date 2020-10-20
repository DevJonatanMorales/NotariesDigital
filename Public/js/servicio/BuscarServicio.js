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
      if (result == 0) {
        layout += `<tr>
                    <td>No hay datos que coincidan.</td>
                  </tr>`;
        $("#tbody").html(layout);
      } else {     
        result.forEach((datos) => {
          layout += `<tr>
                      <td style="width: 250px" >${datos.nom_servicio}</td>
                      <td style="width: 155px" >${datos.categoria}</td>
                      <td style="width: 650px" >${datos.des_servicio}</td>
                    </tr>`;
        });

        $("#tbody").html(layout);
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
      
      result.forEach((datos) => {
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
