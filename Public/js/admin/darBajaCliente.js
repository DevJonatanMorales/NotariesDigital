/** 
*
* Comentario Mostrar los datos
*
**/
const Mostrar = () => {
  let datos = {
    accion: 'mostrar'
  };

  let layout = "";
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/darBajaCliente.php",
    data: {datos},
    success: function (responce) {
      
      $("#tbody").html("");
      if (responce == 0) {
        layout += `<tr>
                    <td>No hay datos que coincidan.</td>
                  </tr>`;
        $("#tbody").html(layout);
      } else {     
        responce.forEach((datos) => {
         layout += `<tr class="${datos.estado_id == 1 ? 'alert-success' : 'alert-danger'} text-dark">
                      <td style="width: 80px" >
                          <img src="../../img/${datos.foto}" width="35" height="35" class="d-inline-block align-top rounded-circle" alt="Error" loading="lazy">
                      </td> 
                      <td style="width: 150px" >${datos.user}</td>                    
                      <td style="width: 175px" >${datos.nombres}</td>
                      <td style="width: 75px" >${datos.estado}</td>
                      <td style="width: 230px" > 
                        <button type="submit" class="btn btn-success mx-0 text-white" id="${datos.usuario_id}">
                          Activar
                        </button>
                        <button type="submit" class="btn btn-danger mx-0 text-white" id="${datos.usuario_id}">
                          Desactivar
                        </button>
                      </td>
                    </tr>`;
        });

        $("#tbody").html(layout);
      }      
    },
    error: function () {
      console.log('No se ha podido obtener la información.');
    }
  });
}

window.addEventListener('load', Mostrar);

/** 
*
* Comentario: Buscar
*
**/
let buscar = document.getElementById('buscar');

const Buscar = () => {
  let datos = {
    accion: 'buscar',
    valor: buscar.value
  }

  let layout = "";

  $.ajax({
    type: "post",
    url: "../../../Private/Models/AdminModels/darBajaCliente.php",
    data: {datos},
    success: function (responce) {
      $("#tbody").html("");
      if (responce == 0) {
        layout += `<tr>
                    <td>No hay datos que coincidan.</td>
                  </tr>`;
        $("#tbody").html(layout);
      } else {     
        responce.forEach((datos) => {
         layout += `<tr class="${datos.estado_id == 1 ? 'alert-success' : 'alert-danger'} text-dark">
                      <td style="width: 100px" >
                          <img src="../../img/${datos.foto}" width="35" height="35" class="d-inline-block align-top rounded-circle" alt="Error" loading="lazy">
                      </td> 
                      <td style="width: 150px" >${datos.user}</td>                    
                      <td style="width: 200px" >${datos.nombres}</td>
                      <td style="width: 75px" >${datos.estado}</td>
                      <td style="width: 250px" > 
                        <button type="submit" class="btn btn-success mx-0 text-white" id="${datos.usuario_id}">
                          Activar
                        </button>
                        <button type="submit" class="btn btn-danger mx-0 text-white" id="${datos.usuario_id}">
                          Desactivar
                        </button>
                      </td>
                    </tr>`;
        });

        $("#tbody").html(layout);
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información.");
    }
  });
}

buscar.addEventListener('keyup', Buscar);

/** 
*
* Comentario: Activar
*
**/
const Activar = (id) => {
  let datos = {
    accion: 'activo',
    userId: id
  }
  
  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/darBajaCliente.php",
    data: {datos},
    success: function (responce) {
      
      if (responce == 1) {
        Mostrar();
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al dar de baja.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información.");
    }
  })
}

$(document).on('click', '.btn-danger', function () {
  let elementId = $(this);  

  Swal.fire({
    title: '¿Está seguro que desea dar de baja al usuario?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#27AE61',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      Desactivar(elementId[0].id);
    }    
  })

});

/** 
*
* Comentario: Inactivo
*
**/
const Desactivar = (id) => {
  let datos = {
    accion: 'inactivo',
    userId: id
  }

  $.ajax({
    type: "POST",
    url: "../../../Private/Models/AdminModels/darBajaCliente.php",
    data: {datos},
    success: function (responce) {
      
      if (responce == 1) {
        Mostrar();
      } else {
        Swal.fire({
          type: 'warning',
          title: 'Advertencia',
          text: 'Error al dar de baja.',
          confirmButtonText: 'aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información.");
    }
  })
}

$(document).on('click', '.btn-success', function () {
  let elementId = $(this);  
  
  Swal.fire({
    title: '¿Está seguro que desea activar el usuario?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#27AE61',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      Activar(elementId[0].id);
    }    
  })
  
});