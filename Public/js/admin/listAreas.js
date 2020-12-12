/** 
*
* Comentario Se muestran los servicio
*
**/
const MostrarArea = () => {
  let layout = "";
  const datos = {accion: 'mostrar'};

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ServiciosModels/MostrarAreas.php",
    data: {datos},
    success: function (result) {      
      result.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 500px" >
                      ${datos.nom_areas}
                    </td> 
                    <td style="width: 90px" >
                      <button type="submit" class="btn btnModel bg-success text-white" id="${datos.areas_id}">
                        <i class="fas fa-edit"></i>
                      </button>
                    <td style="width: 100px" >
                      <button type="submit" class="btn btnDelete bg-danger text-white" id="${datos.areas_id}">
                        <i class="far fa-trash-alt "></i>
                      </button>
                    </td>
                  </tr>`;
      });
      $("#tbody").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    }
  });
}

window.addEventListener("load", MostrarArea);

/** 
*
* Comentario: Buscar area
*
**/
let buscarArea = document.getElementById('buscar');

const BuscarArea = () => {
  let layout = "";
  let datos = {
    accion: 'buscar',
    query: buscarArea.value
  }

  $.ajax({
    type: 'POST',
    url: "../../../Private/Models/ServiciosModels/MostrarAreas.php",
    data: {datos},
    success: function (result) {
      result.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 500px" >
                      ${datos.nom_areas}
                    </td> 
                    <td style="width: 90px" >
                      <button type="submit" class="btn btnModel bg-success text-white" id="${datos.areas_id}">
                        <i class="fas fa-edit"></i>
                      </button>
                    <td style="width: 100px" >
                      <button type="submit" class="btn btnDelete bg-danger text-white" id="${datos.areas_id}">
                        <i class="far fa-trash-alt "></i>
                      </button>
                    </td>
                  </tr>`;
      });
      $("#tbody").html(layout);
    },
    error: function () {
      console.log('No se ha podido obtener la información');
    }
  });
  
}

buscarArea.addEventListener('keyup', BuscarArea);

/** 
*
* Comentario Nueva area
*
**/
const formularioNewArea = document.getElementById('formularioNewArea');
let txtArea = document.getElementById('newArea');
let btnGuardarArea = document.getElementById('btnGuardar');

const valCampo = () => {
  if(txtArea.value.length > 3){
    btnGuardarArea.removeAttribute("disabled");
  } else {
    btnGuardarArea.setAttribute("disabled", "");
  }
}

txtArea.addEventListener('keyup', valCampo);

const GuardarArea = () => {
  let datos = {
    accion: 'guardar',
    area: txtArea.value
  };

  $.ajax({
    type: "POST",
    url: '../../../Private/Models/AdminModels/nuevaArea.php',
    data: {datos},
    success: function (data) {
      MostrarArea()
      if (data == 1) {
        $("#myModal .close").click();
      } else {

      }
    },
    error: function () {
      console.log('No se ha podido obtener la información');
    }
  });
  
}

const LimpiarCampos = () => {
  txtArea.value = '';
}

formularioNewArea.addEventListener('submit', e => {
  e.preventDefault();
  if (txtArea.value.length > 3) {
    GuardarArea();
    formularioNewArea.reset();
    LimpiarCampos();
  } else {
    console.log('error');
  }
});

/** 
*
* Comentario Modal
*
**/
$(document).on('click', '.btnModel', function () {
  let elementId = $(this).parent().parent();
  let elemento = $(this)

  nom_servicio = elementId[0].innerText;
  btnId = elemento[0].id;

  document.getElementById('areaId').value = btnId;
  document.getElementById('modificarArea').value = nom_servicio;
  $('#myModalUpDate').modal({show:true});
});

/** 
*
* Comentario Modificar Servicio
*
**/
const formularioUpDate = document.getElementById('formularioUpDate');
let modificarArea = document.getElementById('modificarArea');
let areaId = document.getElementById('areaId');

const ModificarArea = () => {
  let datos = {
    accion: 'modificar',
    areaId: areaId.value,
    area: modificarArea.value
  }
  console.log(datos);
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/modificarArea.php',
    data: {datos},
    success: function (result) {

      MostrarArea();
      $("#myModalUpDate .close").click()
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
  })
}

formularioUpDate.addEventListener('submit', (e) => {
  e.preventDefault();
  ModificarArea();
  formularioUpDate.reset();
});

/** 
*
* Comentario Eliminar Servicio
*
**/
const EliminarArea = (id) => {
  let datos = {
    accion: 'eliminar',
    areaId: id
  }

  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/eliminarArea.php',
    data: {datos},
    success: function (result) {
      console.log(result);
      MostrarArea();
      if (result == 1) {
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Área eliminada con exito.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
      if (result == 2) {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'El área no se puede eliminar, ya tiene servicios asignados.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });       
      }
      if (result == 0) {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al eliminar el área, por favor intente más tarde.',
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

$(document).on('click', '.btnDelete', function () {
  let elemento = $(this);
  areaId = elemento[0].id;
  
  Swal.fire({
    title: '¿Está seguro de eliminar?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#27AE61',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      EliminarArea(areaId);
    }    
  })
});