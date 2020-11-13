const Areas = () => {
  const datos = {accion: 'mostrar'};
  let layout = '';

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ServiciosModels/MostrarAreas.php",
    data: {datos},
    success: function (result) {      
      if (result == 0) {
        layout += `<option value="0">Error</option>`;
      } else {
        result.forEach((datos) =>{
          layout += `<option value="${datos.areas_id}">${datos.nom_areas}</option>`;
        })
      }
      $("#area").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    }
  });
}

const Mostrar = () => {
  let layout = "";
  const datos = {accion: 'mostrar'};
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/listServicio.php',
    data: {datos},
    success: function (result) {

      result.forEach((datos) => {
        layout += `<tr class="servicio">
                    <td style="width: 500px" >
                      ${datos.nom_servicio}
                    </td>                    
                    <td style="width: 370px" >
                      ${datos.nom_areas}
                    </td> 
                    <td style="width: 190px" >
                      <button type="submit" class="btn bg-success text-white" id="${datos.servicios_id}">
                          <i class="fas fa-edit"></i> Modificar
                        </button>
                    </td>
                  </tr>`;
      });
      $("#tbody").html(layout);
    },
    error: function () {
      console.log('no se pudo obtener la informacion');
    }
  })
}

window.addEventListener('load', () => {
  Areas();
  Mostrar();
});

/** 
*
* Comentario Buscar
*
**/
let txtBuscar = document.getElementById('buscar');
const Buscar = () => {
  let layout = '';
  datos = {
    accion: 'buscar',
    query: txtBuscar.value
  }
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/listServicio.php',
    data: {datos},
    success: function (result) {
      if (result == 0) {
        layout += `<tr>
                    <td>No hay datos que coincidan.</td>
                  </tr>`;
        $("#tbody").html(layout);
      } else {
        result.forEach((datos) => {
        layout += `<tr class="servicio">
                    <td style="width: 500px" >
                      ${datos.nom_servicio}
                    </td>                    
                    <td style="width: 370px" >
                      ${datos.nom_areas}
                    </td> 
                    <td style="width: 190px" >
                      <button type="submit" class="btn bg-success text-white" id="${datos.servicios_id}">
                          <i class="fas fa-edit"></i> Modificar
                        </button>
                    </td>
                  </tr>`;
        });
        $("#tbody").html(layout);
      }
    },
    error: function () {
      console.log('No se ha podido obtener la información');
    }
  })
}
txtBuscar.addEventListener('keyup', Buscar);

/** 
*
* Comentario Modificar
*
**/
$(document).on('click', '.servicio', function () {
  let elementId = $(this).children();
  nom_servicio = elementId[0].innerText;
  btnId = elementId[2].firstElementChild.id;

  document.getElementById('serverId').value = btnId;
  document.getElementById('servicio').value = nom_servicio;
  $('#myModal').modal({show:true});
});

/** 
*
* Comentario Modificar
*
**/
const formularioUpDate = document.getElementById('formularioUpDate');
const serverId = document.getElementById('serverId');
let servicio = document.getElementById('servicio');
let area = document.getElementById('area');

const Modificar = () => {
  let datos = {
    accion: 'modificar',
    servicioId: serverId.value,
    servicio: servicio.value,
    area: area.value
  }

  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/modificarServicio.php',
    data: {datos},
    success: function (result) {
      $("#myModal .close").click();
      Mostrar();
      if (result == 1) {
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Datos actualizados con exito.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al actualizar los datos.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });       
      }
    },
    error: function () {
      console.log('No se ha podido obtener la informacion.');
    }
  });

}

formularioUpDate.addEventListener('submit', (e) => {
  e.preventDefault();
  Modificar();
  formularioUpDate.reset();
});

