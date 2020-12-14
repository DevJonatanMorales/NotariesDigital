/** 
*
* Comentario Mostrar Citas
*
**/
const MostrarCitas = () => {
  let datos = { accion: 'mostrar'};
  let layout = '';
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/agendarCita.php",
    data: { datos },
    success: function (responce) {
      if (responce == 0) {
        layout += `<tr>
                    <td>No hay datos que mostrar.</td>
                  </tr>`;
      } else {
        responce.forEach((datos) =>{
          layout += `<tr>
                      <td style="width: 150px" >${datos.nom_servicio}</td>
                      <td style="width: 200px" >${datos.nombres}</td>
                      <td style="width: 250px" >${datos.fecha} ${datos.horario}</td>
                      <td style="width: 200px" >${datos.comentario}</td>
                      <td style="width: 280px" >
                        <button type="submit" class="btn btn-danger btnCancelar" id="${datos.cita_id}">
                          Cancelar
                        </button>
                      </td>
                    </tr>`;
        })
      }
      $("#tbody").html(layout);
    },
    error: function () {
      console.log("No se ha podido obtener la informacion.");
    }
  });
}

window.addEventListener("load", MostrarCitas);

/** 
*
* Comentario Cancelar cita
*
**/
const CancelaCita = (id) => {
  let datos = {accion: 'cancelar',  citaId: id};

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/ClienteModels/agendarCita.php",
    data: { datos },
    success: function (responce) {
      console.log(responce);
      if (responce == 1) {
        MostrarCitas();
        Swal.fire({
          type: 'success',
          title: 'Éxito',
          text: 'Cita cancelada con éxito.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error cancelar la cita.',
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

$(document).on("click", ".btnCancelar", function () {
  let element = $(this);
  Swal.fire({
    title: '¿Está seguro de cancelar la cita?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#27AE61',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      CancelaCita(element[0].id);
    }    
  })
  
})