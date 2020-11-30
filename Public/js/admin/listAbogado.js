/** 
*
* Comentario Mostrar
*
**/
const MostrarClientes = () => {
  let layout = "";
  let datos = {
    accion: "mostrar"
  };
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/listAbogado.php",
    data: { datos },
    before: function () {
      $("#tbody").html("Cargando datos...");
    },
    success: function (result) {

      result.forEach((datos) => {
        layout += `<tr>
                      <td style="width: 100px" >
                          <img src="../../img/${datos.foto}" width="35" height="35" class="d-inline-block align-top rounded-circle" alt="Error"
              loading="lazy">
                      </td> 
                      <td style="width: 300px" >${datos.nombres} ${datos.apellidos}</td>                    
                      <td style="width: 150px" >${datos.telefono}</td>
                      <td style="width: 275px" >${datos.email}</td>
                      <td style="width: 125px" >
                        <button type="submit" class="btn fondoDos text-white" id="${datos.usuario_id}">
                          Modificar
                        </button>
                      </td>
                      <td style="width: 125px" >
                        <button type="submit" class="btn fondoDos text-white" id="${datos.usuario_id}">
                          Eliminar
                        </button>
                      </td>
                    </tr>`;
      });

      $("#tbody").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
};

window.addEventListener("load", MostrarClientes);

/** 
*
* Comentario Buscar
*
**/
let buscarServicio = document.getElementById("buscar");

const BuscarCliente = () => {
  let datos = {
    accion: "buscar",
    sql: buscarServicio.value
  };

  let layout = "";

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/listAbogado.php",
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
                      <td style="width: 100px" >
                          <img src="../../img/${datos.foto}" width="35" height="35" class="d-inline-block align-top rounded-circle" alt="Error"
              loading="lazy">
                      </td> 
                      <td style="width: 300px" >${datos.nombres} ${datos.apellidos}</td>                    
                      <td style="width: 150px" >${datos.telefono}</td>
                      <td style="width: 275px" >${datos.email}</td>
                      <td style="width: 125px" >
                        <button type="submit" class="btn fondoDos text-white" id="${datos.usuario_id}">
                          Modificar
                        </button>
                      </td>
                      <td style="width: 125px" >
                        <button type="submit" class="btn fondoDos text-white" id="${datos.usuario_id}">
                          Eliminar
                        </button>
                      </td>
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

buscarServicio.addEventListener("keyup", BuscarCliente);