let buscarServicio = document.getElementById("buscar");

const BuscarHistorial = () => {
  let datos = {
    accion: "buscarHistorial",
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
                    <td style="width: 205px" >${datos.nombres}</td>
                    <td style="width: 225px" >${datos.nom_servicio}</td>
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

const MostrarHistorial = () => {
  let layout = "";
  let datos = {
    accion: "historial",
  };
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/BuscarServicio.php",
    data: { datos },
    before: function () {
      $("#tbody").html("Cargando datos...");
    },
    success: function (result) {
      $("#tbody").html("");
      if (result == 0) {
        layout += `<tr>
                    <td>Usted aun no ha realizado tramites.</td>
                  </tr>`;
        $("#tbody").html(layout);
      } else {     
        result.forEach((datos) => {
          layout += `<tr>
                    <td style="width: 205px" >${datos.nombres}</td>
                    <td style="width: 225px" >${datos.nom_servicio}</td>
                    <td style="width: 650px" >${datos.des_servicio}</td>
                    </tr>`;
        });
      }

      $("#tbody").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

buscarServicio.addEventListener("keyup", BuscarHistorial);
window.addEventListener("load", MostrarHistorial);
