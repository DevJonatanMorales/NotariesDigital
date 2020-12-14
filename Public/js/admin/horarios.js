/** 
*
* Comentario Mostrar Horarios
*
**/
const MostrarHorarios = () => {
  let datos = { accion: 'mostrar' };
  let layout = "";

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/horarios.php",
    data: {datos},
    success: function (responce) {
      if (responce == 0) {
        layout += `<tr>
                    <td>No hay datos que coincidan.</td>
                  </tr>`;
        $("#tbody").html(layout);
      } else {
        responce.forEach((datos) => {
          layout += `<tr id="${datos.horario_id}">
                    <td style="width: 150px" >
                      ${datos.turno}
                    </td>                    
                    <td style="width: 350px" >
                      ${datos.horario}
                    </td> 
                    <td style="width: 100px" >
                      <button type="submit" class="btn btn-success btnModificar text-white" id="${datos.servicios_id}">
                        <i class="fas fa-edit"></i>
                      </button>
                    </td> 
                    <td style="width: 100px" >
                      <button type="submit" class="btn btn-danger btnEliminar text-white" id="${datos.servicios_id}">
                        <i class="fas fa-trash-alt"></i>
                      </button>                      
                    </td>
                  </tr>`;
        });
        $("#tbody").html(layout);
      }
    },
    error: function () {
      console.log("No se ha podido obtener la informacion");
    }
  });
}

window.addEventListener("load", MostrarHorarios);

/** 
*
* Comentario Guardar Horario
*
**/
let formulario = document.getElementById('formulario');
let turno = document.getElementById('turno');
let de = document.getElementById('de');
let a = document.getElementById('a');

const GuardarHorario = (turno,horario) => {
  let datos = {
    accion: 'guardar',
    turno: turno,
    horario: horario
  }
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/horarios.php",
    data: {datos},
    success: function (responce) {
      
      if (responce == 1) {
        MostrarHorarios();
        $("#myModal .close").click();
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Éxito al guardar el horario.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al guardar el horario.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      console.log("No se ha podido obtener la informacion.");
    }
  });
}

formulario.addEventListener('submit', (e) => {
  e.preventDefault();
  if (turno.value.length > 3 && de.value.length > 3 && a.value.length > 3) {
    GuardarHorario(turno.value, `horario de: ${de.value}, a: ${a.value}`);
    formulario.reset();
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Advertencia',
      text: 'Por favor complete el formulario.',
      confirmButtonText: 'aceptar',
      showConfirmButton: true
    });
  }
  
});

/** 
*
* Comentario Modificar
*
**/
const ModificarHorario = (horarioId,turno,horario) => {
  let datos = { accion: 'modificar', horarioId: horarioId, turno: turno, horario: horario};
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/horarios.php",
    data: {datos},
    success: function (responce) {
      
      if (responce == 1) {
        MostrarHorarios();
        $("#myModalModificar .close").click();
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Éxito al modificar el horario.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al modificar el horario.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      console.log("No se ha podido obtener la informacion.");
    }
  });
}

$(document).on("click", ".btnModificar", function () {
  let element = $(this).parents('tr');
  let horarioId = element[0].id;
  let turno = element[0].children[0].innerHTML.trim();
  document.getElementById('newTurno').value = turno;
  document.getElementById('horarioId').value = horarioId;

  $('#myModalModificar').modal({show:true});
});

let formModificar = document.getElementById('formModificar');
let horarioId = document.getElementById('horarioId');
let newTurno = document.getElementById('newTurno');
let txtDe = document.getElementById('txtDe');
let txtA = document.getElementById('txtA');

formModificar.addEventListener('submit', (e) => {
  e.preventDefault();
  if (horarioId.value.length > 0 && newTurno.value.length > 3 && txtDe.value.length > 3 && txtA.value.length > 3) {
    ModificarHorario(horarioId.value, newTurno.value, `horario de: ${txtDe.value}, a: ${txtA.value}`);
    formulario.reset();
  } else {
    Swal.fire({
      type: 'warning',
      title: 'Advertencia',
      text: 'Por favor complete el formulario.',
      confirmButtonText: 'aceptar',
      showConfirmButton: true
    });
  }
  
});

/** 
*
* Comentario Eliminar
*
**/
const Eliminar = (id) => {
  let datos = { accion: 'eliminar', horarioId: id}

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/horarios.php",
    data: { datos },
    success: function (responce) {
      
      if (responce == 1) {
        MostrarHorarios();
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Éxito eliminar el horario.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al eliminar horario.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      console.log("No se ha podido obtener la informacion");
    }
  });
}

$(document).on("click", '.btnEliminar', function () {
  let element = $(this).parents('tr');

  Swal.fire({
    title: '¿Está seguro de salir?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#27AE61',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      Eliminar(element[0].id);
    }    
  });

});