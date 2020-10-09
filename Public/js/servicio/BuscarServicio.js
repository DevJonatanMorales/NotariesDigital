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
      const datos = JSON.parse(result);
      datos.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 225px" >${datos.nom_servicio}</td>
                    <td style="width: 130px" >${datos.categoria}</td>
                    <td style="width: 700px" >${datos.des_servicio}</td>
                  </tr>`;
      });
      $("#tbody").html(layout);
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
                    <td style="width: 225px" >${datos.nom_servicio}</td>
                    <td style="width: 130px" >${datos.categoria}</td>
                    <td style="width: 700px" >${datos.des_servicio}</td>
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
