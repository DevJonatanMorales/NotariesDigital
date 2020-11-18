/** 
*
* Comentario Mostrar
*
**/
const MostrarServicio = () => {
  let layout = "";
  let datos = {
    accion: "mostrar",
  };
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ServiciosModels/MostrarServicio.php",
    data: { datos },
    before: function () {
      $("#tbody").html("Cargando datos...");
    },
    success: function (result) {
      
      result.forEach((datos) => {
        layout += `<tr>
                      <td style="width: 400px" >${datos.nom_servicio}</td>
                      <td style="width: 290px" >${datos.nom_areas}</td>
                    </tr>`;
      });

      $("#tbody").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

/* - Comentario Areas - */
const MostrarAreas = () => {
  const datos = {
    accion: 'mostrar'
  }

  let layout = '<option value="0">Todos</option>';
  
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/ServiciosModels/MostrarAreas.php',
    data: {datos},
    success: function (result) {
      if (result == 0) {
        layout += `<option value="0">Error</option>`;
      } else {
        result.forEach((datos) =>{
          layout += `<option value="${datos.areas_id}">${datos.nom_areas}</option>`;
        })
      }
      $("#areas").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la informacion.");
    }
  });
}
window.addEventListener("load", () => {MostrarServicio(); MostrarAreas();});

/** 
*
* Comentario Filtrar
*
**/
let cmbAreas = document.getElementById('areas');

const Filtrar = () => {
  let datos ={
    accion: 'filtrar',
    filtro: cmbAreas.value,
  }

  let layout = '';
  
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/ServiciosModels/FiltrarServicios.php',
    data: {datos},
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
                      <td style="width: 400px" >${datos.nom_servicio}</td>
                      <td style="width: 290px" >${datos.nom_areas}</td>
                    </tr>`;
        });

        $("#tbody").html(layout);
      }
    },
    error: function () {
      console.log('No se ha podido obtener la informacion.');
    }
  })
}

cmbAreas.addEventListener("change", Filtrar);

/** 
*
* Comentario Buscar
*
**/
let buscarServicio = document.getElementById("buscar");

const BuscarServicio = () => {
  let datos = {
    accion: "buscar",
    sql: buscarServicio.value,
  };
  let layout = "";
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ServiciosModels/MostrarServicio.php",
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
                      <td style="width: 400px" >${datos.nom_servicio}</td>
                      <td style="width: 290px" >${datos.nom_areas}</td>
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

buscarServicio.addEventListener("keyup", BuscarServicio);