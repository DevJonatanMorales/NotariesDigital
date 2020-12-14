/** 
*
* Comentario Cargar abogados
*
**/
const MostrarAbogados = () => {
  let layout = '';
  let datos = { accion: 'mostrar' }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/mostrarAbogados.php",
    data: {datos},
    success: function (responce) {
      responce.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 100px" >
                      <img src="../../img/${datos.foto}" width="35" height="35" class="d-inline-block align-top rounded-circle" alt="Error" loading="lazy">
                    </td>
                    <td style="width: 200px" >${datos.nombres} ${datos.apellidos}</td>
                    <td style="width: 180px" >
                      <button type="submit" class="btn btn-info btn-sm btnAbogado" id="${datos.abogado_id}">
                        Seleccionar
                      </button>
                    </td>
                  </tr>`;
      });

      $("#tbody").html(layout);
    },
    error: function () {
      console.log('No se ha podido obtenier la informacions');
    }
  });

}

/** 
*
* Comentario Cargar horarios
*
**/
const MostrarHorarios = () => {
  let layout = '';
  let datos = {accion: 'mostrar'}

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/horarios.php",
    data: {datos},
    success: function (responce) {

      responce.forEach((datos) => {
        layout += `<tr>
                    <td style="width: 100px" >
                      ${datos.turno}
                    </td>
                    <td style="width: 400px" >${datos.horario}</td>
                    <td style="width: 210px" >
                      <button type="submit" class="btn btn-info btn-sm btnHorario" id="${datos.horario_id}">
                        Seleccionar
                      </button>
                    </td>
                  </tr>`;
      });

      $("#tbodyHorarios").html(layout);
    },
    error: function () {
      console.log('No se ha podido obtenier la informacions');
    }
  });
}

/* - Comentario: Funcion que recupera la variable GET - */
const getParameterByName = (name) => {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  let regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
/* - Comentario Ejecutamos las funciones - */
window.addEventListener('load', () => {
  MostrarAbogados();
  MostrarHorarios();
  document.getElementById('servicio_id').value = getParameterByName('_id');
  document.getElementById('servicio').value = getParameterByName('servicio');
});

/** 
*
* Comentario Selecciona abogado
*
**/
$(document).on('click', '.btnAbogado', function () {

  let element = $(this).parents('tr');
  let abogado = element[0].children[1].innerHTML;
  let idAbogado = element[0].children[2].children[0].id;
  
  document.getElementById('abogado_id').value = idAbogado;
  document.getElementById('abogado').value = abogado;
  $("#staticBackdrop .close").click();
});

/** 
*
* Comentario Selecciona horario
*
**/
$(document).on('click', '.btnHorario', function () {

  let element = $(this).parents('tr');
  let elemento = $(this)
  let turno = element[0].children[0].innerHTML.trim();
  let horario = element[0].children[1].innerHTML.trim();
  
  document.getElementById('horario_id').value = elemento[0].id;
  document.getElementById('horario').value = `${turno}, ${horario}`;
  $("#horarios .close").click();
});

/** 
*
* Comentario Agendar Cita
*
**/
let formulario = document.getElementById('formulario');
let servicioId = document.getElementById('servicio_id');
let abogadoId = document.getElementById('abogado_id');
let fecha = document.getElementById('fecha');
let horarioId = document.getElementById('horario_id');
let comentario = document.getElementById('comentario');

const AgendarCita = () => {
  let datos = { 
    accion: 'agendar',
    servicioId: servicioId.value,
    abogadoId: abogadoId.value,
    fecha: fecha.value,
    horarioId: horarioId.value,
    comentario: comentario.value
  };
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/agendarCita.php",
    data: {datos},
    success: function (responce) {
      console.log(responce);
      if (responce == 1) {
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Cira agendada con extio.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error agendar cita.',
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

  if (
    servicioId.value.length > 0 &&
    abogadoId.value.length > 0 &&
    fecha.value.length > 0 &&
    horarioId.value.length > 0
  ) {
    AgendarCita();
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
