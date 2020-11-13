/** 
*
* Comentario Mostrar
*
**/
const Areas = () => {
  let datos = {accion: 'getArea'};
  let layout = '';
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/nuevoServicio.php',
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
      console.log('No se ha podido obtener la inforacion');
    }
  })
}

window.addEventListener('load', Areas);

/** 
*
* Comentario Guardar nuevo
*
**/
const form = document.getElementById('formulario');
const btnGuadarServicio = document.getElementById('btnGuadarServicio');
let txtServicio = document.getElementById('servicio');
let cmbAreas = document.getElementById('area');

const valTXT = () => {
  if (txtServicio.value.length > 3) {
    btnGuadarServicio.removeAttribute("disabled");
  } else {
    btnGuadarServicio.setAttribute("disabled", "");
  }
}

txtServicio.addEventListener('keyup', valTXT);

const Nuevo = () => {
  let datos = {
    accion: 'nuevo',
    areas_id: cmbAreas.value,
    servicio: txtServicio.value
  }
  
  $.ajax({
    type: 'POST',
    url: '../../../Private/Models/AdminModels/nuevoServicio.php',
    data: {datos},
    success: function (result) {
      if (result == 1) {
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Servicio creado con exito.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al crear el servicio.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      console.log('No se ha podido obtener la informacion');
    }
  });
}

form.addEventListener('submit', (e) => {
  e.preventDefault();
  Nuevo();
  form.reset();
});

